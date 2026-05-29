<?php

namespace Alexmal\OrdaApi\Enums;

enum TypeEnum: string
{
    case AUDIO_REC = 'audio-rec';
    case BANNER = 'banner';
    case LIVE_AUDIO = 'live-audio';
    case VIDEO = 'video';
    case TEXT_GRAPHIC_BLOCK = 'text-graphic-block';
    case TEXT_BLOCK = 'text-block';
    case LIVE_VIDEO = 'live-video';
    case TEXT_VIDEO_BLOCK = 'text-video-block';
    case TEXT_AUDIO_BLOCK = 'text-audio-block';
    case TEXT_AUDIO_VIDEO_BLOCK = 'text-audio-video-block';
    case TEXT_GRAPHIC_VIDEO_BLOCK = 'text-graphic-video-block';
    case TEXT_GRAPHIC_AUDIO_BLOCK = 'text-graphic-audio-block';
    case TEXT_GRAPHIC_AUDIO_VIDEO_BLOCK = 'text-graphic-audio-video-block';
    case BANNER_HTML5 = 'banner-html5';
    case OTHER = 'other';
}
