<?php

    namespace Simplon\Instagram\Vo;

    use Simplon\Instagram\Helper\VoDataHelper;

    class UserVo
    {
        protected $_id;
        protected $_username;
        protected $_fullName;
        protected $_profilePicture;
        protected $_bio;
        protected $_website;

        // ######################################

        /**
         * @param array $data
         *
         * @return UserVo
         */
        public function setData(array $data)
        {
            (new VoDataHelper())
                ->setField('id', function ($val) { $this->setId($val); })
                ->setField('username', function ($val) { $this->setUsername($val); })
                ->setField('full_name', function ($val) { $this->setFullName($val); })
                ->setField('profile_picture', function ($val) { $this->setProfilePicture($val); })
                ->setField('bio', function ($val) { $this->setBio($val); })
                ->setField('website', function ($val) { $this->setWebsite($val); })
                ->applyOn($data);

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getFullName()
        {
            return (string)$this->_fullName;
        }

        // ######################################

        /**
         * @param string $fullName
         *
         * @return UserVo
         */
        public function setFullName($fullName)
        {
            $this->_fullName = $fullName;

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
         * @return UserVo
         */
        public function setId($id)
        {
            $this->_id = $id;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getProfilePicture()
        {
            return (string)$this->_profilePicture;
        }

        // ######################################

        /**
         * @param string $profilePicture
         *
         * @return UserVo
         */
        public function setProfilePicture($profilePicture)
        {
            $this->_profilePicture = $profilePicture;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getUsername()
        {
            return (string)$this->_username;
        }

        // ######################################

        /**
         * @param string $username
         *
         * @return UserVo
         */
        public function setUsername($username)
        {
            $this->_username = $username;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getBio()
        {
            return (string)$this->_bio;
        }

        // ######################################

        /**
         * @param string $bio
         *
         * @return UserVo
         */
        public function setBio($bio)
        {
            $this->_bio = $bio;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getWebsite()
        {
            return (string)$this->_website;
        }

        // ######################################

        /**
         * @param string $website
         *
         * @return UserVo
         */
        public function setWebsite($website)
        {
            $this->_website = $website;

            return $this;
        }
    } 