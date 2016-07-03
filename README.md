#DB Changes
#Add your mysql hostname and credentials
application/config/database.php
$db['default']['hostname'] = '';
$db['default']['username'] = '';
$db['default']['password'] = '';
$db['default']['database'] = '';

#Config Changes
$config['base_url'] = 'http://yuvasp.xyz/forum/';

Mysql:
CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `views` (
  `visit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `views` (`visit`) VALUES (0);
