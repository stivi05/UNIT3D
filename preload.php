<?php

opcache_compile_file(__DIR__.'/vendor/autoload.php');

class Preloader
{
    private array $ignores = [];

    private static int $count = 0;

    private array $paths;

    private array $fileMap;

    public function __construct(string ...$paths)
    {
        $this->paths = $paths;
        $classMap = require __DIR__.'/vendor/composer/autoload_classmap.php';
        $this->fileMap = array_flip($classMap);
    }

    public function paths(string ...$paths): self
    {
        $this->paths = array_merge(
            $this->paths,
            $paths
        );

        return $this;
    }

    public function ignore(string ...$names): self
    {
        $this->ignores = array_merge(
            $this->ignores,
            $names
        );

        return $this;
    }

    public function load(): void
    {
        foreach ($this->paths as $path) {
            $this->loadPath(rtrim($path, '/'));
        }

        $count = self::$count;

        echo "[Preloader] Preloaded {$count} classes".PHP_EOL;
    }

    private function loadPath(string $path): void
    {
        if (is_dir($path)) {
            $this->loadDir($path);

            return;
        }

        $this->loadFile($path);
    }

    private function loadDir(string $path): void
    {
        $handle = opendir($path);

        while ($file = readdir($handle)) {
            if (\in_array($file, ['.', '..'])) {
                continue;
            }

            $this->loadPath("{$path}/{$file}");
        }

        closedir($handle);
    }

    private function loadFile(string $path): void
    {
        $class = $this->fileMap[$path] ?? null;

        if ($this->shouldIgnore($class)) {
            return;
        }

        opcache_compile_file($path);

        self::$count++;

        echo "[Preloader] Preloaded `{$class}`".PHP_EOL;
    }

    private function shouldIgnore(?string $name): bool
    {
        if ($name === null) {
            return true;
        }

        foreach ($this->ignores as $ignore) {
            if (str_starts_with($name, $ignore)) {
                return true;
            }
        }

        return false;
    }
}

(new Preloader())
    ->paths(
        __DIR__.'/app',
    )
    ->load();
