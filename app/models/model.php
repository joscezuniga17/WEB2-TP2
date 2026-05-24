<?php
require_once __DIR__ . '/../../config.php';

class Model {

    protected $db;

    public function __construct() {
        $this->db = new PDO(
        "mysql:host=".MYSQL_HOST .
        ";dbname=".MYSQL_DB.";charset=utf8", 
        MYSQL_USER, MYSQL_PASS);
        
    }

        private function _deploy() {

            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll();

            if (count($tables) == 0) {

                $sql = <<<END
             
                
                CREATE TABLE `canciones` (
                `id_cancion` int(11) NOT NULL,
                `nombre_cancion` varchar(100) NOT NULL,
                `artista` varchar(100) NOT NULL,
                `album` varchar(100) DEFAULT NULL,
                `genero` varchar(100) NOT NULL,
                `anio` year(4) DEFAULT NULL,
                `duracion` time DEFAULT NULL,
                `mood` varchar(45) DEFAULT NULL,
                `youtube_link` varchar(255) DEFAULT NULL,
                `id_playlist` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
             
                INSERT INTO `canciones` (`id_cancion`, `nombre_cancion`, `artista`, `album`, `genero`, `anio`, `duracion`, `mood`, `youtube_link`, `id_playlist`) VALUES
                (1, 'Love me do', 'The Beatles', 'Please Please Me', 'Rock and Roll', '1963', '00:02:22', 'Amor', 'https://www.youtube.com/watch?v=0pGOFX1D_jg', 3),
                (4, 'Billie Jean', '\r\nMichael Jackson', '\r\nThriller', '\r\nRhythm and blues y Dance pop', '1983', '00:04:54', 'Misterioso bailable', 'https://www.youtube.com/watch?v=Zi_XLOBDo_Y', 1),
                (5, 'The Verve', 'Bitter Sweet Symphony', 'Urban Hymns', 'Britpop', '1997', '00:04:35', 'Melancolia', 'https://www.youtube.com/watch?v=1lyu1KKwC74&list=RD1lyu1KKwC74&start_radio=1', 1),
                (6, 'Without Me', 'Eminem', '\r\nThe Eminem Show', 'Rap', '2000', '00:04:58', 'Energico', 'https://www.youtube.com/watch?v=YVkUvmDQ3HY&list=RDYVkUvmDQ3HY&start_radio=1', 1),
                (7, 'That Should Be Me ', 'Justin Bieber', 'My World 2.0', 'Desamor', '2010', '00:03:52', 'Triste', 'https://www.youtube.com/watch?v=2Xulk9Ahqmc&list=RD2Xulk9Ahqmc&start_radio=1', 3),
                (10, 'Climb', 'Miley Cyrus', 'Hannah Montana: La película', 'Country pop, Country', '2009', '00:03:49', 'Esperanza', 'https://www.youtube.com/watch?v=FOOsx9ytTzg&list=RDFOOsx9ytTzg&start_radio=1', 1),
                (11, 'Viva la vida', 'Coldplay', 'Coldplay: A Head Full of Dreams', 'Pop/rock', '2008', '00:04:03', 'Melancolia', 'https://www.youtube.com/watch?v=dvgZkm1xWPE', 1),
                (12, 'Super Trouper', 'Abba', 'Super trouper', 'Pop', '1980', '00:04:11', 'Amor', 'https://www.youtube.com/watch?v=BshxCIjNEjY', 5),
                (13, 'The winer takes it all', 'Abba', NULL, '\r\nR&B/Soul', '1980', NULL, 'Triste', 'https://www.youtube.com/watch?v=92cwKCU8Z5c&list=RD92cwKCU8Z5c&start_radio=1', 5),
                (14, 'Vivir así es morir de amor', 'Camilo Sesto', 'Vivir así es morir de amor', '', '1978', NULL, NULL, NULL, 6),
                (15, 'Stayin\' Alive', 'Bee Gees', NULL, 'Funky', '1977', NULL, NULL, NULL, 6),
                (18, 'Hotel California', 'Eagles', NULL, 'Rock', '1976', NULL, NULL, NULL, 6),
                (19, 'Dream On', 'Aerosmith', NULL, '', '1973', NULL, NULL, NULL, 6);
           

                CREATE TABLE `playlist` (
                `id_playlist` int(11) NOT NULL,
                `nombre_playlist` varchar(100) NOT NULL,
                `id_usuario` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;            

                INSERT INTO `playlist` (`id_playlist`, `nombre_playlist`, `id_usuario`) VALUES
                (1, 'Music chill', 1),
                (3, 'Amor', 2),
                (4, 'Rock', 4),
                (5, '80s', 2),
                (6, '70s', 5);
                
                CREATE TABLE `usuarios` (
                `id_usuario` int(11) NOT NULL,
                `nombre_usuario` varchar(100) NOT NULL,
                `email` varchar(100) NOT NULL,
                `password` varchar(255) NOT NULL,
                `rol` varchar(200) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

                INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `email`, `password`, `rol`) VALUES
                (1, 'Josce', 'zunigajosce@gmail.com', '12345678', ''),
                (2, 'Justin', 'justinbieber@gmail.com', '123456789', ''),
                (4, 'webadmin', 'webadmin@gmail.com', '$2y$10$uN99Z1WvEMbCgOUbYvN8aeXfXGvYI0EWhfJ4rA2S8E8bA1mBqMv2.', 'admin'),
                (5, 'Maria', 'maria@gmail.com', 'hola', ''),
                (6, 'julian alvarez', 'juli@gmail.com', 'riverteamo', '');
                
                END;

                $this->db->query($sql);
            }
        }
}

