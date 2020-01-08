<?php

namespace SpotifyWebAPI\Services;

use SpotifyWebAPI\SpotifyPagination;

/**
 * @author Kiril Kirkov
 * Spotify Artists Service
 */

class Artists
{
    const GET_ARTIST = '/v1/artists/{id}';
    const GET_ARTIST_ALBUMS = '/v1/artists/{id}/albums';
    const GET_ARTIST_TOP_TRACKS = '/v1/artists/{id}/top-tracks';
    const GET_ARTIST_RELATED_ARTISTS = '/v1/artists/{id}/related-artists';
    const GET_ARTISTS = '/v1/artists';

    /**
     * Get an Artist
     * Authorization - Required
     * @param string $id Id of artist.
     */
    public static function getArtist($id)
    {
        return [
            'requestType' => 'GET',
            'uri' => str_replace('{id}', $id, self::GET_ARTIST),
        ];
    }

    /**
     * Get an Artist's Albums
     * Authorization - Required
     * @param string $id Id of artist.
     */
    public static function getArtistAlbums($id)
    {
        SpotifyPagination::setHasPagination(true);
        return [
            'requestType' => 'GET',
            'uri' => str_replace('{id}', $id, self::GET_ARTIST_ALBUMS),
        ];
    }

    /**
     * Get an Artist's Top Tracks
     * Authorization - Required
     * @param string $id Id of artist.
     */
    public static function getArtistTopTracks($id)
    {
        return [
            'requestType' => 'GET',
            'uri' => str_replace('{id}', $id, self::GET_ARTIST_TOP_TRACKS),
        ];
    }

    /**
     * Get an Artist's Related Artists
     * Authorization - Required
     * @param string $id Id of artist.
     */
    public static function getArtistRelatedArtists($id)
    {
        return [
            'requestType' => 'GET',
            'uri' => str_replace('{id}', $id, self::GET_ARTIST_RELATED_ARTISTS),
        ];
    }

    /**
     * Get Several Artists
     * Authorization - Required
     * @param array $ids Array with ids.
     */
    public static function getArtists(Array $ids)
    {
        $ids_string = implode(',', $ids);
        return [
            'queryString' => ['ids' => $ids_string],
            'requestType' => 'GET',
            'uri' => self::GET_ARTISTS,
        ];
    }
}