<?php

    namespace Simplon\Instagram\Media;

    use Simplon\Instagram\Core\InstagramConstants;
    use Simplon\Instagram\Core\InstagramRequests;
    use Simplon\Instagram\Vo\FeedVo;
    use Simplon\Instagram\Vo\LikesDataVo;
    use Simplon\Instagram\Vo\MediaVo;

    class Media
    {
        /**
         * @param $accessToken
         * @param string $mediaId
         *
         * @return MediaVo
         */
        public function getInfo($accessToken, $mediaId)
        {
            $params = [
                'access_token' => $accessToken,
            ];

            $endpoint = str_replace('{{mediaId}}', $mediaId, InstagramConstants::ENDPOINT_MEDIA_INFO);
            $response = InstagramRequests::get($endpoint, $params);

            return (new MediaVo())->setData($response);
        }

        // ######################################

        /**
         * @param $accessToken
         *
         * @return FeedVo
         */
        public function getPopular($accessToken)
        {
            $params = [
                'access_token' => $accessToken,
            ];

            $response = InstagramRequests::get(InstagramConstants::ENDPOINT_MEDIA_POPULAR, $params);

            return (new FeedVo())->setData($response);
        }

        // ######################################

        /**
         * @param $accessToken
         * @param $mediaId
         *
         * @return LikesDataVo
         */
        public function getLikes($accessToken, $mediaId)
        {
            $params = [
                'access_token' => $accessToken,
            ];

            $endpoint = str_replace('{{mediaId}}', $mediaId, InstagramConstants::ENDPOINT_MEDIA_LIKES);
            $response = InstagramRequests::get($endpoint, $params);

            return (new LikesDataVo())
                ->setCount(count($response))
                ->setLikeData($response);
        }

        // ######################################

        /**
         * @param $accessToken
         * @param $mediaId
         *
         * @return bool
         */
        public function postLike($accessToken, $mediaId)
        {
            $params = [
                'access_token' => $accessToken,
            ];

            $endpoint = str_replace('{{mediaId}}', $mediaId, InstagramConstants::ENDPOINT_MEDIA_LIKES);
            InstagramRequests::post($endpoint, $params);

            return TRUE;
        }

        // ######################################

        /**
         * @param $accessToken
         * @param $mediaId
         *
         * @return bool
         */
        public function deleteLike($accessToken, $mediaId)
        {
            $params = [
                'access_token' => $accessToken,
            ];

            $endpoint = str_replace('{{mediaId}}', $mediaId, InstagramConstants::ENDPOINT_MEDIA_LIKES);
            InstagramRequests::delete($endpoint, $params);

            return TRUE;
        }

        // ######################################

        /**
         * @param $accessToken
         * @param $mediaId
         *
         * @return LikesDataVo
         */
        public function getComments($accessToken, $mediaId)
        {
            $params = [
                'access_token' => $accessToken,
            ];

            $endpoint = str_replace('{{mediaId}}', $mediaId, InstagramConstants::ENDPOINT_MEDIA_COMMENTS);
            $response = InstagramRequests::get($endpoint, $params);

            return (new LikesDataVo())
                ->setCount(count($response))
                ->setLikeData($response);
        }

        // ######################################

        /**
         * @param $accessToken
         * @param $mediaId
         * @param $text
         *
         * @return bool
         */
        public function postComment($accessToken, $mediaId, $text)
        {
            $params = [
                'access_token' => $accessToken,
                'text'         => $text,
            ];

            $endpoint = str_replace('{{mediaId}}', $mediaId, InstagramConstants::ENDPOINT_MEDIA_COMMENTS);
            InstagramRequests::post($endpoint, $params);

            return TRUE;
        }

        // ######################################

        /**
         * @param $accessToken
         * @param $mediaId
         * @param $commentId
         *
         * @return bool
         */
        public function deleteComment($accessToken, $mediaId, $commentId)
        {
            $params = [
                'access_token' => $accessToken,
            ];

            $endpoint = str_replace('{{mediaId}}', $mediaId, InstagramConstants::ENDPOINT_MEDIA_COMMENTS);
            $endpoint = str_replace('{{commentId}}', $commentId, $endpoint);
            InstagramRequests::delete($endpoint, $params);

            return TRUE;
        }
    } 