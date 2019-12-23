<?php
/**
 * NOTICE OF LICENSE.
 *
 * UNIT3D is open-sourced software licensed under the GNU Affero General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D
 *
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html/ GNU Affero General Public License v3.0
 * @author     HDVinnie
 */

namespace App\Console\Commands;

use Exception;
use App\Mail\TestEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

final class TestMailSettings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected string $signature = 'test:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected string $description = 'Send A Test Email To Owner Account Using The Current Mail Configuration';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(): void
    {
        $owner = User::where('id', '=', 3)->pluck('email');

        $this->info('Sending Test Email To '.$owner);
        sleep(5);

        try {
            Mail::to($owner)->send(new TestEmail());
        } catch (Exception $exception) {
            $this->error('Failed!');
            $this->alert('Email failed to send. Please review your mail configs in the .env file.');
            exit(1);
        }

        $this->alert('Email Was Successfully Sent!');
    }
}
