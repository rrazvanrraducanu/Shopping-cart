CREATE DATABASE flori;
USE flori;
CREATE TABLE `flowers` (
  `id` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `culoare` varchar(50) NOT NULL,
  `marime` varchar(50) NOT NULL,
  `pret` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `flowers` (`id`, `nume`, `culoare`, `marime`, `pret`) VALUES
(1, 'trandafiri', 'rorii', 'mari', 50),
(2, 'lalele', 'albe', 'medii', 20);


ALTER TABLE `flowers`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `flowers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
