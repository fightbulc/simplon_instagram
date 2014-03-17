<?php

    namespace Simplon\Instagram\Vo;

    use Simplon\Instagram\Helper\VoDataHelper;

    class MediaVo
    {
        protected $_id;
        protected $_createdTime;
        protected $_filter;
        protected $_link;
        protected $_tags;
        protected $_type;

        protected $_usersInPhotoData;
        protected $_userInPhotoVoMany;

        protected $_captionData;
        protected $_captionVo;

        protected $_commentsData;
        protected $_commentsDataVo;

        protected $_imagesData;
        protected $_videoData;

        protected $_likesData;
        protected $_likesDataVo;

        protected $_locationData;
        protected $_locationVo;

        protected $_userData;
        protected $_userVo;

        // ######################################

        /**
         * @param array $data
         *
         * @return MediaVo
         */
        public function setData(array $data)
        {
            (new VoDataHelper())
                ->setField('id', function ($val) { $this->setId($val); })
                ->setField('caption', function ($val) { $this->setCaptionData($val); })
                ->setField('comments', function ($val) { $this->setCommentsData($val); })
                ->setField('created_time', function ($val) { $this->setCreatedTime($val); })
                ->setField('filter', function ($val) { $this->setFilter($val); })
                ->setField('images', function ($val) { $this->setImagesData($val); })
                ->setField('likes', function ($val) { $this->setLikesData($val); })
                ->setField('link', function ($val) { $this->setLink($val); })
                ->setField('location', function ($val) { $this->setLocationData($val); })
                ->setField('tags', function ($val) { $this->setTags($val); })
                ->setField('type', function ($val) { $this->setType($val); })
                ->setField('user', function ($val) { $this->setUserData($val); })
                ->setField('users_in_photo', function ($val) { $this->setUsersInPhotoData($val); })
                ->applyOn($data);

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getCaptionData()
        {
            return (array)$this->_captionData;
        }

        // ######################################

        /**
         * @return CaptionVo
         */
        public function getCaptionVo()
        {
            if (!$this->_captionVo)
            {
                $data = $this->getCaptionData();

                if (!empty($data))
                {
                    $this->_captionVo = (new CaptionVo())->setData($data);
                }
            }

            return $this->_captionVo;
        }

        // ######################################

        /**
         * @param string $caption
         *
         * @return MediaVo
         */
        public function setCaptionData($caption)
        {
            $this->_captionData = $caption;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getCommentsData()
        {
            return (array)$this->_commentsData;
        }

        // ######################################

        /**
         * @return CommentsDataVo
         */
        public function getComments()
        {
            return (new CommentsDataVo())->setData($this->getCommentsData());
        }

        // ######################################

        /**
         * @param array $commentsData
         *
         * @return MediaVo
         */
        public function setCommentsData(array $commentsData)
        {
            $this->_commentsData = $commentsData;

            return $this;
        }

        // ######################################

        /**
         * @return int
         */
        public function getCreatedTime()
        {
            return (int)$this->_createdTime;
        }

        // ######################################

        /**
         * @param string $createdTime
         *
         * @return MediaVo
         */
        public function setCreatedTime($createdTime)
        {
            $this->_createdTime = $createdTime;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getFilter()
        {
            return (string)$this->_filter;
        }

        // ######################################

        /**
         * @param string $filter
         *
         * @return MediaVo
         */
        public function setFilter($filter)
        {
            $this->_filter = $filter;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getId()
        {
            return (string)$this->_id;
        }

        // ######################################

        /**
         * @param string $id
         *
         * @return MediaVo
         */
        public function setId($id)
        {
            $this->_id = $id;

            return $this;
        }

        // ######################################

        /**
         * @param $key
         *
         * @return array
         */
        protected function _getImagesDataByKey($key)
        {
            return (array)$this->_imagesData[$key];
        }

        // ######################################

        /**
         * @return ImageVo
         */
        public function getImageLowResolution()
        {
            return (new ImageVo())->setData($this->_getImagesDataByKey('low_resolution'));
        }

        // ######################################

        /**
         * @return ImageVo
         */
        public function getImageStandardResolution()
        {
            return (new ImageVo())->setData($this->_getImagesDataByKey('standard_resolution'));
        }

        // ######################################

        /**
         * @return ImageVo
         */
        public function getImageThumbnail()
        {
            return (new ImageVo())->setData($this->_getImagesDataByKey('thumbnail'));
        }

        // ######################################

        /**
         * @param array $imagesData
         *
         * @return MediaVo
         */
        public function setImagesData(array $imagesData)
        {
            $this->_imagesData = $imagesData;

            return $this;
        }

        // ######################################

        /**
         * @param $key
         *
         * @return array
         */
        protected function _getVideoDataByKey($key)
        {
            return (array)$this->_videoData[$key];
        }

        // ######################################

        /**
         * @return VideoVo
         */
        public function getVideoLowResolution()
        {
            return (new VideoVo())->setData($this->_getVideoDataByKey('low_resolution'));
        }

        // ######################################

        /**
         * @return VideoVo
         */
        public function getVideoStandardResolution()
        {
            return (new VideoVo())->setData($this->_getVideoDataByKey('standard_resolution'));
        }

        // ######################################

        /**
         * @param array $videoData
         *
         * @return MediaVo
         */
        public function setVideoData(array $videoData)
        {
            $this->_videoData = $videoData;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getLikesData()
        {
            return (array)$this->_likesData;
        }

        // ######################################

        /**
         * @return LikesDataVo
         */
        public function getLikes()
        {
            if (!$this->_likesDataVo)
            {
                $this->_likesDataVo = (new LikesDataVo())->setData($this->getLikesData());
            }

            return $this->_likesDataVo;
        }

        // ######################################

        /**
         * @param array $likesData
         *
         * @return MediaVo
         */
        public function setLikesData(array $likesData)
        {
            $this->_likesData = $likesData;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getLink()
        {
            return (string)$this->_link;
        }

        // ######################################

        /**
         * @param string $link
         *
         * @return MediaVo
         */
        public function setLink($link)
        {
            $this->_link = $link;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getLocationData()
        {
            return (array)$this->_locationData;
        }

        // ######################################

        /**
         * @return LocationVo
         */
        public function getLocationVo()
        {
            if (!$this->_locationVo && $this->_locationData)
            {
                $this->_locationVo = (new LocationVo())->setData($this->getLocationData());
            }

            return $this->_locationVo;
        }

        // ######################################

        /**
         * @param array $locationData
         *
         * @return MediaVo
         */
        public function setLocationData($locationData)
        {
            $this->_locationData = $locationData;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getTags()
        {
            return (array)$this->_tags;
        }

        // ######################################

        /**
         * @param array $tags
         *
         * @return MediaVo
         */
        public function setTags(array $tags)
        {
            $this->_tags = $tags;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getType()
        {
            return (string)$this->_type;
        }

        // ######################################

        /**
         * @param string $type
         *
         * @return MediaVo
         */
        public function setType($type)
        {
            $this->_type = $type;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getUserData()
        {
            return (array)$this->_userData;
        }

        // ######################################

        /**
         * @return UserVo
         */
        public function getUser()
        {
            return (new UserVo())->setData($this->getUserData());
        }

        // ######################################

        /**
         * @param array $userData
         *
         * @return MediaVo
         */
        public function setUserData(array $userData)
        {
            $this->_userData = $userData;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getUsersInPhotoData()
        {
            return (array)$this->_usersInPhotoData;
        }

        // ######################################

        /**
         * @return UserInPhotoVo[]
         */
        public function getUsersInPhoto()
        {
            if (!$this->_userInPhotoVoMany)
            {
                $this->_userInPhotoVoMany = [];
                $usersInPhotoData = $this->getUsersInPhotoData();

                foreach ($usersInPhotoData as $data)
                {
                    $this->_userInPhotoVoMany[] = (new UserInPhotoVo())->setData($data);
                }
            }

            return $this->_userInPhotoVoMany;
        }

        // ######################################

        /**
         * @param array $usersInPhoto
         *
         * @return MediaVo
         */
        public function setUsersInPhotoData(array $usersInPhoto)
        {
            $this->_usersInPhotoData = $usersInPhoto;

            return $this;
        }
    }