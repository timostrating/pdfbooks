<?php 
	
    /* this is a comment  CREATE TABLE `products` (
  `plaatje` varchar(255) COLLATE utf8_bin NOT NULL,
  `naam` varchar(255) COLLATE utf8_bin NOT NULL,
  `beschrijving` longtext COLLATE utf8_bin NOT NULL,
  `prijs` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`plaatje`, `naam`, `beschrijving`, `prijs`) VALUES
('https://www.boekwinkeltjes.nl/boekwinkeltjes/images/book_stash.png', 'Boek', 'Hele mooie boek gap', 100);
COMMIT; */
?>

<?php
$host = '127.0.0.1';
$db   = 'pdfbooks';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);
?>


<?php include_once('header.php'); ?>


<?php $stmt = $pdo->query('SELECT * FROM products');
while ($row = $stmt->fetch())
{
    echo "<img src=\"" . $row['plaatje'] . "\">";
    echo "<h4>". $row['naam'] . "</h4>";
    echo "<p>" . $row['beschrijving'] . "</p>";
    echo "<i><b> &#8364;" . $row['prijs'] . "</b></i>";
} ?>




<?php include_once('footer.php'); ?>