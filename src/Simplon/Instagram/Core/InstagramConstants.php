<?php

    namespace Simplon\Instagram\Core;

    class InstagramConstants
    {
        // generic

        CONST URL_API_ROOT = 'https://api.instagram.com';

        CONST USER_REL_ACTION_FOLLOW = 'follow';
        CONST USER_REL_ACTION_UNFOLLOW = 'unfollow';
        CONST USER_REL_ACTION_BLOCK = 'block';
        CONST USER_REL_ACTION_UNBLOCK = 'unblock';
        CONST USER_REL_ACTION_APPROVE = 'approve';
        CONST USER_REL_ACTION_DENY = 'deny';

        CONST MEDIA_TYPE_IMAGE = 'image';
        CONST MEDIA_TYPE_VIDEO = 'video';

        // --------------------------------------

        // auth scopes

        CONST SCOPE_BASIC = 'basic';
        CONST SCOPE_COMMENTS = 'comments';
        CONST SCOPE_RELATIONSHIPS = 'relationships';
        CONST SCOPE_LIKES = 'likes';

        // --------------------------------------

        // endpoints 

        CONST ENDPOINT_OAUTH_AUTHORIZE = '/oauth/authorize/';
        CONST ENDPOINT_OAUTH_ACCESS_TOKEN = '/oauth/access_token/';

        CONST ENDPOINT_USER_BASIC_INFO = '/v1/users/{{userId}}';
        CONST ENDPOINT_USER_MEDIA_RECENT = '/v1/users/{{userId}}/media/recent';
        CONST ENDPOINT_USER_FEED_SELF = '/v1/users/self/feed';
        CONST ENDPOINT_USER_LIKED_SELF = '/v1/users/self/media/liked';
        CONST ENDPOINT_USER_SEARCH_BY_NAME = '/v1/users/search';
        CONST ENDPOINT_USER_RELATIONSHIP = '/v1/users/{{userId}}/relationship';

        CONST ENDPOINT_MEDIA_INFO = '/v1/media/{{mediaId}}';
        CONST ENDPOINT_MEDIA_SEARCH = '/v1/media/search';
        CONST ENDPOINT_MEDIA_POPULAR = '/v1/media/popular';
        CONST ENDPOINT_MEDIA_LIKES = '/v1/media/{{mediaId}}/likes';
        CONST ENDPOINT_MEDIA_COMMENTS = '/v1/media/{{mediaId}}/comments';
        CONST ENDPOINT_MEDIA_COMMENT_DELETE = '/v1/media/{{mediaId}}/comments/{{commentId}}';

        CONST ENDPOINT_TAGS_INFO = '/v1/tags/{{tagName}}';
        CONST ENDPOINT_TAGS_MEDIA_RECENT = '/v1/tags/{{tagName}}/media/recent';
        CONST ENDPOINT_TAGS_SEARCH = '/v1/tags/search';

        // --------------------------------------

        // errors

        CONST ERR_AUTH_MISSING_CLIENT_ID_CODE = 1000;
        CONST ERR_AUTH_MISSING_CLIENT_ID_MESSAGE = 'Missing client_id.';
        CONST ERR_AUTH_MISSING_CLIENT_SECRET_CODE = 1001;
        CONST ERR_AUTH_MISSING_CLIENT_SECRET_MESSAGE = 'Missing client_secret.';
        CONST ERR_AUTH_MISSING_REDIRECT_URI_CODE = 1002;
        CONST ERR_AUTH_MISSING_REDIRECT_URI_MESSAGE = 'Missing redirect_uri.';

        CONST ERR_MISSING_ENDPOINT_CODE = 1100;
        CONST ERR_MISSING_ENDPOINT_MESSAGE = 'Please provide desired endpoint. Available endpoints: http://instagram.com/developer/endpoints';
    } 