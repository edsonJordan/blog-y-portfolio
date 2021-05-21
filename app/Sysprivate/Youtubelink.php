<?php

namespace App\Sysprivate;

use Faker\Factory;
use Faker\Generator;
use Faker\Provider\Base;
use Faker\Provider\Youtube;
use PHPUnit\Framework\TestCase;


class Youtubelink extends Base{
    public function youtubeId()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            . 'abcdefghijklmnopqrstuvwxyz_-';

        $id = substr($this->shuffle($characters), 0, 25);

        return $this->generator->parse($id);
    }

    public function youtubeUri()
    {
        return 'https://www.youtube.com/watch?v=' . $this->youtubeId();
    }

    public function youtubeShortUri()
    {
        return 'https://youtu.be/' . $this->youtubeId();
    }

    public function youtubeEmbedUri()
    {
        return 'https://www.youtube.com/embed/' . $this->youtubeId();
    }

    public function youtubeEmbedCode()
    {
        return '<iframe width="560" height="315" src="' . $this->youtubeEmbedUri()
            . '" frameborder="0" gesture="media" allow="encrypted-media"'
            . ' allowfullscreen></iframe>';
    }

    public function youtubeChannelUri()
    {
        return sprintf('https://www.youtube.com/%s/%s',
        $this->randomElement(['channel', 'user']), 
        $this->regexify(sprintf('[a-zA-Z0-9\-]{1,%s}', $this->numberBetween(1, 22))) 
        );
    }

    public function youtubeRandomUri()
    {
        switch ($this->numberBetween(1,3)) {
            case 1:
                return $this->youtubeUri();

                break;

            case 2:
                return $this->youtubeShortUri();

                break;

            case 3:
                return $this->youtubeEmbedUri();

                break;

            default:
                return $this->youtubeUri();

                break;
        }
    }
} 