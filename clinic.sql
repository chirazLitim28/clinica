-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 29 mai 2023 à 19:20
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `clinic`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_firstname` varchar(127) NOT NULL,
  `admin_lastname` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `admin_firstname`, `admin_lastname`) VALUES
(1, 'manel', '$2y$10$k7pY2OKrAbYETcnrarm9TOJGt7GuerGRQpOZ6ct0.bfZL0NYcptti', 'manel', 'kara');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `cname` varchar(127) NOT NULL,
  `cemail` varchar(127) NOT NULL,
  `subject` varchar(127) NOT NULL,
  `message` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`contact_id`, `cname`, `cemail`, `subject`, `message`) VALUES
(1, 'chiraz', 'chiraz.litim@ensia.edu.dz', 'chirazsdksdl,', 'chirazqskdklqsdl'),
(22, 'meriem', 'meriem@gmail.com', 'jfuyfyfyf', 'yguyfyfufytdyrytytrd'),
(23, 'sdjlqksdj', 'chiraz38@gmail.com', 'qdznaklalzk', 'kjazdoijozkdjoi'),
(28, 'lqksjdne', 'chiraz38@gmail.com', 'a,zokjok', 'lkz,flkokejokjeozl');

-- --------------------------------------------------------

--
-- Structure de la table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(127) NOT NULL,
  `lname` varchar(127) NOT NULL,
  `specialties` varchar(127) NOT NULL,
  `doctor_phone` int(12) NOT NULL,
  `doctor_email` varchar(127) NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `username`, `password`, `fname`, `lname`, `specialties`, `doctor_phone`, `doctor_email`, `gender`) VALUES
(11, 'chiraz', '$2y$10$5y2euokWPUHdJ0.Mt7UWN.3JK1f6PIXYoqhjpE7QUVHwxgTqHt31C', 'chiraz', 'litim', '1', 6457841, 'chiraz@gmail.com', 'female'),
(12, 'meriem', '$2y$10$ywldZa0TaOOmrlslqQvzXuOQfumkvQRoM62SlnXa9urRayMEq3V/a', 'meriem', 'ouari', '12', 7854123, 'meriem@gmail.com', 'female'),
(13, 'amir', '$2y$10$aDsjMHotGtrvEYdXJp47peINM1bNgGiz.eVVzRQvgfeIjF8.rTmHO', 'amir', 'kara', '3', 6987412, 'amir@gmail.com', 'male'),
(14, 'chiraz2', '$2y$10$jfeMXMG.nL4foIuwl.9nz.sUZpbu1SAOIavwnToN6wcke4JSphuDu', 'chiraz', 'kara', '1', 123445, 'chiraz32@gmail.com', 'female'),
(15, 'zalkelzierli', '$2y$10$r7HsOcFw8krYZBYr6lbTAO/lvlhUyBQNXULknemPlK8jBRP1IfMES', 'isra', 'benchoufi', '2', 667368743, 'chiraz32@gmail.com', 'female'),
(16, 'zsdopzie', '$2y$10$njVnRUHGhUOztoqo4EAZWOAMnbhErjAywU2jrNhY3XBNG3/vdu7TO', 'sdkjfnsj', 'oijdoijp', '2', 667368743, 'chiraz3@gmail.com', 'female');

-- --------------------------------------------------------

--
-- Structure de la table `drugs`
--

CREATE TABLE `drugs` (
  `drug_id` int(11) NOT NULL,
  `drug_name` varchar(127) NOT NULL,
  `drug_quantity` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `drugs`
--

INSERT INTO `drugs` (`drug_id`, `drug_name`, `drug_quantity`) VALUES
(7, 'Procaine', 123),
(8, 'Mepivacaine', 74),
(9, 'Articaine', 38),
(10, 'Bupivacaine', 150),
(11, 'Lidocaine', 79),
(27, 'zuieiuz', 123),
(29, 'qjshkqjhksq', 0),
(30, 'ozieo', 0);

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(127) NOT NULL,
  `lname` varchar(127) NOT NULL,
  `patient_phone` int(12) NOT NULL,
  `patient_email` varchar(127) NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`patient_id`, `username`, `password`, `fname`, `lname`, `patient_phone`, `patient_email`, `gender`) VALUES
(1, 'farah', '$2y$10$5y2euokWPUHdJ0.Mt7UWN.3JK1f6PIXYoqhjpE7QUVHwxgTqHt31C', 'farah', 'kassi', 7896524, 'farah@gmail.com', 'female'),
(2, 'wissal', '$2y$10$ywldZa0TaOOmrlslqQvzXuOQfumkvQRoM62SlnXa9urRayMEq3V/a', 'Manel', 'kara', 6547821, 'wissal@gmail.com', 'female'),
(3, 'yazen', '$2y$10$aDsjMHotGtrvEYdXJp47peINM1bNgGiz.eVVzRQvgfeIjF8.rTmHO', 'yazen', 'kadri', 5478912, 'yazen@gamil.com', 'male');

-- --------------------------------------------------------

--
-- Structure de la table `specialties`
--

CREATE TABLE `specialties` (
  `specialty_id` int(11) NOT NULL,
  `specialty` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `specialties`
--

INSERT INTO `specialties` (`specialty_id`, `specialty`) VALUES
(1, 'General Dentistry'),
(2, 'Orthodontics'),
(3, 'Periodontics'),
(4, 'Oral Surgery');

--
-- Index pour les tables déchargées
--
CREATE TABLE `Appointements` (
  `Appointement_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `session_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Index pour la table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Index pour la table `doctors`
--
ALTER TABLE `Appointements`
  ADD PRIMARY KEY (`Appointement_id`);

ALTER TABLE `Appointements`
  MODIFY `Appointement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;  




--
-- Index pour la table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`drug_id`);

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Index pour la table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`specialty_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `drug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `specialty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE Appointements
ADD CONSTRAINT doctor_id
FOREIGN KEY (doctor_ID)
REFERENCES doctors(doctor_id);


ALTER TABLE Appointements
ADD CONSTRAINT patient_id
FOREIGN KEY (patient_ID)
REFERENCES patients(patient_id);



COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
