<?php

    namespace Simplon\Instagram\Users;

    use Simplon\Instagram\Core\InstagramConstants;
    use Simplon\Instagram\Core\InstagramRequests;
    use Simplon\Instagram\Vo\FeedVo;
    use Simplon\Instagram\Vo\UserRelationshipVo;
    use Simplon\Instagram\Vo\UserShortVo;
    use Simplon\Instagram\Vo\UserVo;

    class Users
    {
        /**
         * @param $accessToken
         * @param $userId
         *
         * @return UserVo
         */
        public function getBasicInfo($accessToken, $userId)
        {
            $params = [
                'access_token' => $accessToken,
            ];

            $endpoint = str_replace('{{userId}}', $userId, InstagramConstants::ENDPOINT_USER_BASIC_INFO);
            $response = InstagramRequests::get($endpoint, $params);

            return (new UserVo())->setData($response);
        }

        // ######################################

        /**
         * @param $accessToken
         * @param array $userIds
         *
         * @return UserVo[]
         */
        public function getBasicInfoFromMany($accessToken, array $userIds)
        {
            $params = [
                'access_token' => $accessToken,
            ];

            $userVoMany = [];

            foreach ($userIds as $userId)
            {
                $endpoint = str_replace('{{userId}}', $userId, InstagramConstants::ENDPOINT_USER_BASIC_INFO);
                $response = InstagramRequests::get($endpoint, $params);
                $userVoMany[] = (new UserVo())->setData($response);
            }

            return $userVoMany;
        }

        // ######################################

        /**
         * @param $accessToken
         * @param int $maxItems
         * @param null $minId
         * @param null $maxId
         *
         * @return FeedVo
         */
        public function getFeedSelf($accessToken, $maxItems = 20, $minId = NULL, $maxId = NULL)
        {
            $params = [
                'access_token' => $accessToken,
                'count'        => $maxItems,
            ];

            if ($minId !== NULL)
            {
                $params['min_id'] = $minId;
            }

            if ($maxId !== NULL)
            {
                $params['max_id'] = $maxId;
            }

            $response = InstagramRequests::get(InstagramConstants::ENDPOINT_USER_FEED_SELF, $params);

            return (new FeedVo())->setData($response);
        }

        // ######################################

        /**
         * @param $accessToken
         * @param $userId
         * @param int $maxItems
         * @param null $minCreated
         * @param null $maxCreated
         * @param null $minId
         * @param null $maxId
         *
         * @return FeedVo
         */
        public function getMediaRecent($accessToken, $userId, $maxItems = 20, $minCreated = NULL, $maxCreated = NULL, $minId = NULL, $maxId = NULL)
        {
            $params = [
                'access_token' => $accessToken,
                'count'        => $maxItems,
            ];

            if ($minCreated !== NULL)
            {
                $params['min_timestamp'] = $minCreated;
            }

            if ($maxCreated !== NULL)
            {
                $params['max_timestamp'] = $maxCreated;
            }

            if ($minId !== NULL)
            {
                $params['min_id'] = $minId;
            }

            if ($maxId !== NULL)
            {
                $params['max_id'] = $maxId;
            }

            $endpoint = str_replace('{{userId}}', $userId, InstagramConstants::ENDPOINT_USER_MEDIA_RECENT);
            $response = InstagramRequests::get($endpoint, $params);

            return (new FeedVo())->setData($response);
        }

        // ######################################

        /**
         * @param $accessToken
         * @param int $maxItems
         * @param null $maxLikedId
         *
         * @return FeedVo
         */
        public function getMediaLikedSelf($accessToken, $maxItems = 20, $maxLikedId = NULL)
        {
            $params = [
                'access_token' => $accessToken,
                'count'        => $maxItems,
            ];

            if ($maxLikedId !== NULL)
            {
                $params['max_like_id'] = $maxLikedId;
            }

            $response = InstagramRequests::get(InstagramConstants::ENDPOINT_USER_LIKED_SELF, $params);

            return (new FeedVo())->setData($response);
        }

        // ######################################

        /**
         * @param $accessToken
         * @param $name
         * @param int $maxItems
         *
         * @return UserShortVo[]
         */
        public function searchByName($accessToken, $name, $maxItems = 20)
        {
            $params = [
                'access_token' => $accessToken,
                'q'            => $name,
                'count'        => $maxItems,
            ];

            $response = InstagramRequests::get(InstagramConstants::ENDPOINT_USER_SEARCH_BY_NAME, $params);

            $userShortVoMany = [];

            foreach ($response as $user)
            {
                $userShortVoMany[] = (new UserShortVo())->setData($user);
            }

            return $userShortVoMany;
        }

        // ######################################

        /**
         * @param $accessToken
         * @param $userId
         *
         * @return UserRelationshipVo
         */
        public function getRelationshipStatus($accessToken, $userId)
        {
            $params = [
                'access_token' => $accessToken,
            ];

            $endpoint = str_replace('{{userId}}', $userId, InstagramConstants::ENDPOINT_USER_RELATIONSHIP);
            $response = InstagramRequests::get($endpoint, $params);

            return (new UserRelationshipVo())->setData($response);
        }

        // ######################################

        /**
         * @param $accessToken
         * @param $userId
         * @param $action
         *
         * @return bool
         */
        protected function _handleRelationship($accessToken, $userId, $action)
        {
            $params = [
                'access_token' => $accessToken,
                'action'       => $action,
            ];

            $endpoint = str_replace('{{userId}}', $userId, InstagramConstants::ENDPOINT_USER_RELATIONSHIP);
            $response = InstagramRequests::post($endpoint, $params);

            if ($response['outgoing_status'] === 'requested')
            {
                return TRUE;
            }

            return FALSE;
        }

        // ######################################

        /**
         * @param $accessToken
         * @param $userId
         *
         * @return bool
         */
        public function relationshipFollow($accessToken, $userId)
        {
            return $this->_handleRelationship($accessToken, $userId, InstagramConstants::USER_REL_ACTION_FOLLOW);
        }

        // ######################################

        /**
         * @param $accessToken
         * @param $userId
         *
         * @return bool
         */
        public function relationshipUnfollow($accessToken, $userId)
        {
            return $this->_handleRelationship($accessToken, $userId, InstagramConstants::USER_REL_ACTION_UNFOLLOW);
        }

        // ######################################

        /**
         * @param $accessToken
         * @param $userId
         *
         * @return bool
         */
        public function relationshipBlock($accessToken, $userId)
        {
            return $this->_handleRelationship($accessToken, $userId, InstagramConstants::USER_REL_ACTION_BLOCK);
        }

        // ######################################

        /**
         * @param $accessToken
         * @param $userId
         *
         * @return bool
         */
        public function relationshipUnblock($accessToken, $userId)
        {
            return $this->_handleRelationship($accessToken, $userId, InstagramConstants::USER_REL_ACTION_UNBLOCK);
        }

        // ######################################

        /**
         * @param $accessToken
         * @param $userId
         *
         * @return bool
         */
        public function relationshipApprove($accessToken, $userId)
        {
            return $this->_handleRelationship($accessToken, $userId, InstagramConstants::USER_REL_ACTION_APPROVE);
        }

        // ######################################

        /**
         * @param $accessToken
         * @param $userId
         *
         * @return bool
         */
        public function relationshipDeny($accessToken, $userId)
        {
            return $this->_handleRelationship($accessToken, $userId, InstagramConstants::USER_REL_ACTION_DENY);
        }
    } 