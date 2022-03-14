<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TorrentController
 */
class TorrentControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function delete_torrent_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $torrent = \App\Models\Torrent::factory()->create();
        $histories = \App\Models\History::factory()->times(3)->create();
        $torrentRequests = \App\Models\TorrentRequest::factory()->times(3)->create();

        $response = $this->post(route('delete'), [
            // TODO: send request data
        ]);

        $response->assertOk();

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function download_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = \App\Models\User::factory()->create();
        $torrent = \App\Models\Torrent::factory()->create();

        $response = $this->get(route('torrent.download.rsskey', ['id' => $torrent->id, 'rsskey' => $torrent->rsskey]));

        $response->assertOk();

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function download_check_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $torrent = \App\Models\Torrent::factory()->create();

        $response = $this->get(route('download_check', ['id' => $torrent->id]));

        $response->assertOk();
        $response->assertViewIs('torrent.download_check');
        $response->assertViewHas('torrent', $torrent);
        $response->assertViewHas('user');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function edit_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $torrent = \App\Models\Torrent::factory()->create();
        $category = \App\Models\Category::factory()->create();

        $response = $this->post(route('edit', ['id' => $torrent->id]), [
            // TODO: send request data
        ]);

        $response->assertOk();

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function edit_form_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $torrent = \App\Models\Torrent::factory()->create();
        $categories = \App\Models\Category::factory()->times(3)->create();
        $types = \App\Models\Type::factory()->times(3)->create();
        $resolutions = \App\Models\Resolution::factory()->times(3)->create();
        $regions = \App\Models\Region::factory()->times(3)->create();
        $distributors = \App\Models\Distributor::factory()->times(3)->create();

        $response = $this->get(route('edit_form', ['id' => $torrent->id]));

        $response->assertOk();
        $response->assertViewIs('torrent.edit_torrent');
        $response->assertViewHas('categories', $categories);
        $response->assertViewHas('types', $types);
        $response->assertViewHas('resolutions', $resolutions);
        $response->assertViewHas('regions', $regions);
        $response->assertViewHas('distributors', $distributors);
        $response->assertViewHas('torrent', $torrent);
        $response->assertViewHas('user');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function history_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $torrent = \App\Models\Torrent::factory()->create();
        $histories = \App\Models\History::factory()->times(3)->create();

        $response = $this->get(route('history', ['id' => $torrent->id]));

        $response->assertOk();
        $response->assertViewIs('torrent.history');
        $response->assertViewHas('torrent', $torrent);
        $response->assertViewHas('history');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function peers_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $torrent = \App\Models\Torrent::factory()->create();
        $peers = \App\Models\Peer::factory()->times(3)->create();

        $response = $this->get(route('peers', ['id' => $torrent->id]));

        $response->assertOk();
        $response->assertViewIs('torrent.peers');
        $response->assertViewHas('torrent', $torrent);
        $response->assertViewHas('peers', $peers);

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function preview_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $response = $this->post('upload/preview', [
            // TODO: send request data
        ]);

        $response->assertOk();

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function reseed_torrent_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $torrent = \App\Models\Torrent::factory()->create();
        $user = \App\Models\User::factory()->create();
        $histories = \App\Models\History::factory()->times(3)->create();

        $response = $this->post(route('reseed', ['id' => $torrent->id]), [
            // TODO: send request data
        ]);

        $response->assertOk();

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function similar_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $torrent = \App\Models\Torrent::factory()->create();
        $tv = \App\Models\Tv::factory()->create();
        $movie = \App\Models\Movie::factory()->create();

        $response = $this->get(route('torrents.similar', ['category_id' => $torrent->category_id, 'tmdb' => $torrent->tmdb]));

        $response->assertOk();
        $response->assertViewIs('torrent.similar');
        $response->assertViewHas('meta');
        $response->assertViewHas('torrent', $torrent);
        $response->assertViewHas('categoryId');
        $response->assertViewHas('tmdbId');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function torrent_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $torrent = \App\Models\Torrent::factory()->create();
        $freeleechToken = \App\Models\FreeleechToken::factory()->create();
        $personalFreeleech = \App\Models\PersonalFreeleech::factory()->create();
        $history = \App\Models\History::factory()->create();
        $tv = \App\Models\Tv::factory()->create();
        $movie = \App\Models\Movie::factory()->create();
        $featuredTorrent = \App\Models\FeaturedTorrent::factory()->create();

        $response = $this->get(route('torrent', ['id' => $torrent->id]));

        $response->assertOk();
        $response->assertViewIs('torrent.torrent');
        $response->assertViewHas('torrent', $torrent);
        $response->assertViewHas('comments');
        $response->assertViewHas('user');
        $response->assertViewHas('personal_freeleech');
        $response->assertViewHas('freeleech_token');
        $response->assertViewHas('meta');
        $response->assertViewHas('trailer');
        $response->assertViewHas('platforms');
        $response->assertViewHas('total_tips');
        $response->assertViewHas('user_tips');
        $response->assertViewHas('featured');
        $response->assertViewHas('mediaInfo');
        $response->assertViewHas('uploader');
        $response->assertViewHas('last_seed_activity');
        $response->assertViewHas('playlists');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function torrents_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $response = $this->get(route('torrents'));

        $response->assertOk();
        $response->assertViewIs('torrent.torrents');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function upload_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $category = \App\Models\Category::factory()->create();

        $response = $this->post(route('upload'), [
            // TODO: send request data
        ]);

        $response->assertOk();

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function upload_form_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $torrent = \App\Models\Torrent::factory()->create();
        $categories = \App\Models\Category::factory()->times(3)->create();
        $types = \App\Models\Type::factory()->times(3)->create();
        $resolutions = \App\Models\Resolution::factory()->times(3)->create();
        $regions = \App\Models\Region::factory()->times(3)->create();
        $distributors = \App\Models\Distributor::factory()->times(3)->create();

        $response = $this->get(route('upload_form', ['category_id' => $torrent->category_id]));

        $response->assertOk();
        $response->assertViewIs('torrent.upload');
        $response->assertViewHas('categories', $categories);
        $response->assertViewHas('types', $types);
        $response->assertViewHas('resolutions', $resolutions);
        $response->assertViewHas('regions', $regions);
        $response->assertViewHas('distributors', $distributors);
        $response->assertViewHas('user');
        $response->assertViewHas('category_id');
        $response->assertViewHas('title');
        $response->assertViewHas('imdb');
        $response->assertViewHas('tmdb');

        // TODO: perform additional assertions
    }

    // test cases...
}
