-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 13 mars 2021 à 22:13
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tdw`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `description` text NOT NULL,
  `heure` time NOT NULL,
  `date` date NOT NULL,
  `id_classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id`, `nom`, `description`, `heure`, `date`, `id_classe`) VALUES
(1, 'excursion - forêt  ', 'Sortie pour les élèves de la classe 1 du niveau 1 à la forêt. ', '10:00:00', '2021-03-27', 1),
(2, 'Visite musée des beaux arts', 'Une visite organisée au musée des beaux arts pour les élèves de la classe 1 du 1er niveau. RDV devant l\'école.', '10:30:00', '2021-03-31', 1);

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `resume` text NOT NULL,
  `tous` int(11) NOT NULL,
  `ens` int(11) NOT NULL,
  `primaire` int(11) NOT NULL,
  `moyen` int(11) NOT NULL,
  `secondaire` int(11) NOT NULL,
  `parents` int(11) NOT NULL,
  `eleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `image`, `description`, `date`, `resume`, `tous`, `ens`, `primaire`, `moyen`, `secondaire`, `parents`, `eleve`) VALUES
(1, 'La fermeture des écoles efficace sur la circulation du virus, selon une étude', 'ecole-covid.JPG', 'La décision de fermer les écoles en Suisse au printemps 2020 a été l\'une des mesures les plus efficaces pour réduire la mobilité, et donc la transmission du Covid-19, selon une étude dévoilée dimanche.', '2021-02-19', 'La décision de fermer les écoles en Suisse au printemps 2020 a été l\'une des mesures les plus efficaces pour réduire la mobilité, et donc la transmission du Covid-19, selon une étude dévoilée dimanche.', 1, 0, 0, 0, 0, 1, 0),
(2, 'Actualisation des méthodes et programmes scolaires: document de projet à enrichir ', 'programme.JPG', 'ALGER- Le ministre de l\'Education nationale, Mohamed Ouadjaout a affirmé, lundi, que les syndicats du secteur \"recevront prochainement pour enrichissement\" un document de projet relatif à la révision et à l\'actualisation des méthodes et programmes d\'enseignement', '2020-03-04', 'ALGER- Le ministre de l\'Education nationale, Mohamed Ouadjaout a affirmé, lundi, que les syndicats du secteur \"recevront prochainement pour enrichissement\" un document de projet relatif à la révision et à l\'actualisation des méthodes et programmes d\'enseignement', 1, 0, 0, 0, 0, 1, 0),
(3, 'Liberté, créativité, épanouissement,ils ont fait l\'école à la maison', 'etude-enligne.JPG', 'Chaque année, environ 50.000 enfants suivent une instruction à domicile. Quatre adultes témoignent de cette enfance particulière.', '2021-01-01', 'Chaque année, environ 50.000 enfants suivent une instruction à domicile. Quatre adultes témoignent de cette enfance particulière.', 1, 0, 0, 0, 0, 0, 0),
(4, 'Numérique à l’école : nouveaux outils, nouveaux usages ?', 'Numerique-de-lecole.JPG', 'Au-delà des écrans, le numérique se matérialise de plus en plus dans nos vies sous forme d’assistants vocaux. De quoi inaugurer une « culture de la conversation », et transformer l’éducation ? Explications de Marion Voillot et Zoé Aegerter.', '2021-02-15', 'Au-delà des écrans, le numérique se matérialise de plus en plus dans nos vies sous forme d’assistants vocaux. De quoi inaugurer une « culture de la conversation », et transformer l’éducation ? Explications de Marion Voillot et Zoé Aegerter.', 1, 0, 0, 0, 0, 0, 0),
(5, 'EDT', 'edt.jpg', 'Consulter l\'emploi du temps global du cycle', '2021-01-01', 'Consulter l\'emploi du temps global du cycle', 0, 0, 1, 1, 1, 0, 0),
(6, 'Liste ENS', 'ens.jpg', 'Consulter la liste des ENS et leurs heures de réception', '2021-01-01', 'Consulter la liste des ENS et leurs heures de réception', 0, 0, 1, 1, 1, 0, 0),
(7, 'Informations pratiques', 'info.png', 'Des informations pratiques qui peuvent vous intéresser! ', '2021-02-09', 'Des informations pratiques qui peuvent vous intéresser! ', 0, 0, 1, 1, 1, 1, 0),
(8, 'Restauration', 'restauration.jpg', 'Consulter le menu et la restauration de l\'école!', '2021-01-01', 'Consulter le menu et la restauration de l\'école!', 0, 0, 1, 1, 1, 0, 0),
(9, 'Plus loin que les bancs de l\'école', 'bancs-ecole.jpg', 'Comment faciliter l’entrée dans le monde du travail quand on est jeune? C’est justement la mission du programme PEMS (Parcours Emploi Mobilité Sport), créé en 2016 par Engie et FACE Paris, qui accompagne des filles et des garçons issu.es de quartiers prioritaires ou de foyers isolés qui veulent trouver une alternance. Tapa Traore a fait partie du programme et s’est même particulièrement distinguée lors d’une semaine d’immersion à l’armée par son caractère volontaire et persévérant. Elle revient sur son expérience.', '2021-02-28', '', 0, 0, 1, 1, 1, 0, 1),
(10, 'La photo de classe, un éternel recommencement', 'photoclasse.png', 'Depuis le XIXe siècle, ce rituel atteste des transformations du milieu scolaire autant qu\'il témoigne de la permanence de l\'institution.', '2021-02-18', '', 0, 0, 1, 1, 1, 0, 1),
(11, 'Dans l\'Éducation nationale, aucune évaluation n\'est innocente', 'evaluation.jpg', 'Pour cette rentrée, Jean-Michel Blanquer a étendu les évaluations standardisées instaurées en 2017 aux classes de CE1 et de seconde. Les élèves s\'y collent, mais dans quel but?', '2021-02-16', '', 0, 0, 1, 1, 1, 0, 1),
(12, 'Comment évaluer les élèves?', 'evaluation2.jpg', 'La méthode de notation n’est pas neutre. Aux États-Unis, il est possible d’identifier au moins trois méthodes.', '2021-02-27', '', 0, 0, 1, 1, 1, 1, 1),
(13, 'Coopération', 'cooperation.png', 'Dans un monde sans cesse plus compétitif, le partenariat est une clé de succès : la force du réseau des établissements de formation..', '2021-02-26', '', 1, 0, 0, 0, 0, 0, 0),
(36, 'Inscription à l’événement AI DAY du club School of AI Algiers', 'AI.png', 'School of AI Algiers is thrilled to invite you to the second edition of AI Day ! We have prepared a full day of discussions, workshops and talks with experts in their fields ! Check below for more details about the four tracks of workshops and the content of the conferences.', '2021-03-12', '', 1, 0, 0, 0, 0, 0, 0),
(37, '[Code&Share] Welcome Day', 'code&share.png', '2020 se termine bientôt et nous ne pouvions tout simplement pas trouver une meilleure façon de célébrer!\r\n\r\nle 25 Décembre à 19h Notre club Code & Share organise le fameux ‘Welcome day’ en ligne;\r\n\r\nPréparez votre tasse de chocolat chaud et rejoignez-nous pour savoir plus sur nous, posez-nous des questions et sachez plus sur Code&Share  lors de la rencontre virtuelle en ligne la plus incroyable et fun ;', '2021-03-12', '', 1, 0, 0, 0, 0, 0, 0),
(38, 'Inscrivez-vous au MEET !', 'meet.png', 'Après vous avoir sollicités pour le choix du métier de la prochaine édition de MEET, c’est avec un grand plaisir que nous revenons vers vous afin de vous fournir plus de détails sur cette future édition.\r\n\r\nComme vous le savez, cette fois-ci c’est la spécialité SIL qui est mise à l’honneur et pour votre plus grand plaisir ce n’est pas un mais deux métiers que nous tenterons de vous faire découvrir :\r\n\r\ncelui d’architecte ainsi que celui d’analyste,', '2021-03-12', '', 1, 0, 0, 0, 0, 0, 0),
(39, 'Les parents, l’école publique et la République', 'parentRep.jpg', 'Comment l’école de la République prend-elle en compte l’existence des parents au moment même de sa fondation dans les années 1880 ? La réponse est assez aisée : elle s’adresse aux familles et celles-ci doivent venir en appui de l’action éducative des enseignants. C’est vrai en primaire comme en secondaire. Certaines familles adoptent une solution radicale d’opposition à l’école en éduquant elles-mêmes leurs enfants, comme la loi les y autorise.', '2021-03-13', '', 0, 0, 0, 0, 0, 1, 0),
(40, 'LE RÔLE ET LA PLACE DES PARENTS À L’ÉCOLE', 'Role.jpg', 'Conformément à l’article L 111-4 du code de l’éducation, “les parents d’élèves sont membres de la communauté éducative. Leur participation à la vie scolaire et le dialogue avec les enseignants et les autres personnels sont assurés dans chaque école et dans chaque établissement. Les parents d’élèves participent par leurs représentants aux conseils d’école, aux conseils d’administration des établissements scolaires et aux conseils de classe”.', '2021-03-13', '', 0, 0, 0, 0, 0, 1, 0),
(41, 'SORTIES SCOLAIRES CULTURE & SCIENCES', 'Excursion.jpg', 'En manque d’idées pour votre sortie scolaire de l’année scolaire prochaine ? L’équipe de Cap Sciences vous emmène hors des murs de l’école pour faire vivre à vos élèves une excursion scolaire à la découverte du riche patrimoine de notre région. ', '2021-03-13', '', 0, 0, 0, 0, 0, 1, 0),
(42, 'Groupes scolaires', 'groupeScolaire.JPG', 'Sortie pédagogique pour les enfants de l’école primaire et maternelle à partir de 4 ans\r\nPour les responsables de classes, il n’est jamais facile de trouver un lieu d’excursion scolaire qui offre des activités pédagogiques aux enfants tout en leur permettant de s’amuser.', '2021-03-13', '', 0, 0, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `id_cycle` int(11) NOT NULL,
  `annee` year(4) NOT NULL,
  `id_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `nom`, `id_cycle`, `annee`, `id_niveau`) VALUES
(1, 'Groupe1', 1, 2021, 1),
(2, 'Groupe2', 1, 2021, 1),
(3, 'Groupe1', 2, 2021, 1),
(4, 'Groupe1', 2, 2021, 2),
(5, 'Groupe2', 2, 2021, 2),
(6, 'Groupe1', 3, 2021, 1),
(7, 'Groupe1', 3, 2021, 2),
(8, 'Groupe1', 3, 2021, 3),
(9, 'Groupe2', 3, 2021, 2);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `user`, `pass`, `type`) VALUES
(1, 'admin', 'admin', 1),
(2, 'e_nour@eformation.com', '1234', 3);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `link`) VALUES
(1, 'facebook.png', 'https://www.facebook.com/'),
(2, 'instagram.png', 'https://www.instagram.com/?hl=fr'),
(3, 'linkedin.png', 'https://fr.linkedin.com/'),
(4, 'admin.png\r\n', '/projet/index/Login');

-- --------------------------------------------------------

--
-- Structure de la table `cycle`
--

CREATE TABLE `cycle` (
  `id` int(11) NOT NULL,
  `cycle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cycle`
--

INSERT INTO `cycle` (`id`, `cycle`) VALUES
(1, 'primaire'),
(2, 'moyen'),
(3, 'secondaire');

-- --------------------------------------------------------

--
-- Structure de la table `diaporama`
--

CREATE TABLE `diaporama` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `diaporama`
--

INSERT INTO `diaporama` (`id`, `link`) VALUES
(1, 'facade.jpg'),
(2, 'pub.jpg'),
(3, 'classe.jpg'),
(4, 'biblio.jpg'),
(5, 'resto.jpg'),
(6, 'sortie.jpg'),
(7, 'sport.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `edt`
--

CREATE TABLE `edt` (
  `id` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `jour` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `edt`
--

INSERT INTO `edt` (`id`, `id_matiere`, `id_classe`, `heure_debut`, `heure_fin`, `jour`) VALUES
(1, 1, 1, '08:00:00', '10:00:00', 'Dimanche'),
(2, 4, 1, '10:00:00', '12:00:00', 'Dimanche'),
(3, 7, 1, '13:00:00', '15:00:00', 'Dimanche'),
(4, 5, 1, '08:00:00', '10:00:00', 'Lundi'),
(5, 6, 1, '10:00:00', '12:00:00', 'Lundi'),
(6, 8, 1, '13:00:00', '15:00:00', 'Lundi'),
(7, 3, 1, '15:00:00', '16:00:00', 'Lundi'),
(8, 4, 1, '08:00:00', '10:00:00', 'Mardi'),
(9, 9, 1, '10:00:00', '12:00:00', 'Mardi'),
(10, 2, 1, '08:00:00', '10:00:00', 'Mercredi'),
(11, 10, 1, '10:00:00', '12:00:00', 'Mercredi'),
(12, 11, 1, '13:00:00', '15:00:00', 'Mercredi'),
(13, 5, 1, '08:00:00', '10:00:00', 'Jeudi'),
(14, 6, 1, '10:00:00', '12:00:00', 'Jeudi'),
(15, 12, 1, '13:00:00', '15:00:00', 'Jeudi'),
(16, 6, 2, '08:00:00', '10:00:00', 'Dimanche'),
(17, 5, 2, '10:00:00', '12:00:00', 'Dimanche'),
(18, 2, 2, '13:00:00', '15:00:00', 'Dimanche'),
(19, 11, 2, '15:00:00', '14:00:00', 'Dimanche'),
(20, 4, 2, '08:00:00', '10:00:00', 'Lundi'),
(21, 3, 2, '10:00:00', '12:00:00', 'Lundi'),
(22, 8, 2, '13:00:00', '15:00:00', 'Lundi'),
(23, 10, 2, '08:00:00', '10:00:00', 'Mardi'),
(24, 7, 2, '10:00:00', '12:00:00', 'Mardi'),
(25, 9, 2, '08:00:00', '10:00:00', 'Mercredi'),
(26, 12, 2, '10:00:00', '12:00:00', 'Mercredi'),
(27, 1, 2, '13:00:00', '15:00:00', 'Mercredi'),
(28, 5, 2, '08:00:00', '10:00:00', 'Jeudi'),
(29, 4, 2, '10:00:00', '12:00:00', 'Jeudi'),
(30, 6, 2, '13:00:00', '15:00:00', 'Jeudi');

-- --------------------------------------------------------

--
-- Structure de la table `ens`
--

CREATE TABLE `ens` (
  `id` int(11) NOT NULL,
  `id_ens` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `id_classe` int(11) NOT NULL,
  `nb_heures` int(11) NOT NULL,
  `heure_reception` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ens`
--

INSERT INTO `ens` (`id`, `id_ens`, `nom`, `prenom`, `id_classe`, `nb_heures`, `heure_reception`) VALUES
(1, 1, 'Benbarek', 'Bouchra', 1, 4, '10:00:00'),
(2, 2, 'Rachedi', 'Nada', 6, 4, '12:00:00'),
(3, 3, 'Afiane', 'Reda', 2, 6, '09:00:00'),
(4, 4, 'Hebbadj', 'Nesrine', 1, 6, '15:00:00'),
(5, 4, 'Hebbadj', 'Nesrine', 3, 4, '14:00:00'),
(6, 5, 'Beddek', 'Lilya', 4, 5, '10:00:00'),
(7, 6, 'Hamdine', 'Dahmane', 4, 3, '12:00:00'),
(8, 6, 'Hamdine', 'Dahmane', 6, 3, '10:00:00'),
(9, 7, 'Medjahed', 'Lamia', 5, 4, '14:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`id`, `titre`, `information`) VALUES
(1, 'Adresse :', '10 Rue des Frères OUDEK, El Harrach 16200 Alger Algérie.'),
(2, 'Numéro de téléphone : ', '(+213) 23 82 85 35'),
(3, 'Mail :', 'eformation@gmail.com'),
(4, 'Fax:', '213 (0) 23 56 38 15');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(11) NOT NULL,
  `matricule` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `id_classe` int(11) NOT NULL,
  `sexe` text NOT NULL,
  `annee` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `matricule`, `nom`, `prenom`, `date_naissance`, `id_classe`, `sexe`, `annee`) VALUES
(1, '19/0001', 'El hassen', 'Nour', '1999-12-16', 1, 'F', 2021),
(2, '20/0002', 'Hennouni', 'Narimane Hind', '2000-03-06', 6, 'F', 2021),
(3, '21/0001', 'Debiane', 'Mehdi', '1999-05-25', 4, 'H', 2021),
(4, '18/0001', 'Khouas', 'Ouerdia', '2000-03-08', 3, 'F', 2021),
(5, '21/0001', 'Benbrahim', 'Adem', '1999-02-01', 1, 'H', 2021);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `coeff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id`, `nom`, `coeff`) VALUES
(1, 'Français', 2),
(2, 'Arabe', 3),
(3, 'Anglais', 2),
(4, 'Mathématique', 5),
(5, 'Physique', 4),
(6, 'Science', 4),
(7, 'Sport', 3),
(8, 'Histoire ', 1),
(9, 'Géographie', 1),
(10, 'Philosophie', 2),
(11, 'Musique', 1),
(12, 'Dessin', 1);

-- --------------------------------------------------------

--
-- Structure de la table `menu_accueil`
--

CREATE TABLE `menu_accueil` (
  `id` int(11) NOT NULL,
  `menu` text NOT NULL,
  `types` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `menu_accueil`
--

INSERT INTO `menu_accueil` (`id`, `menu`, `types`) VALUES
(1, 'Accueil', 0),
(2, 'Présentation', 0),
(3, 'Cycles', 0),
(4, 'Primaire', 1),
(5, 'Moyen', 1),
(6, 'Secondaire', 1),
(7, 'Espace', 0),
(8, 'Élève', 1),
(9, 'Parent', 1),
(10, 'Contact', 0);

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `id` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  `id_cycle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id`, `niveau`, `id_cycle`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 1, 2),
(5, 2, 2),
(6, 3, 2),
(7, 1, 3),
(8, 2, 3),
(9, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `matricule` text NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `Remarques` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id`, `matricule`, `id_matiere`, `note`, `Remarques`) VALUES
(1, '19/0001', 1, 14, 'Bien!'),
(2, '19/0001', 2, 16, 'T.Bien!'),
(3, '19/0001', 3, 10, 'Not doing here Homeworks !'),
(4, '19/0001', 4, 18, 'Trés bien! Continuez..'),
(5, '19/0001', 5, 9, 'Trés faible!'),
(6, '19/0001', 6, 20, 'Excellent!'),
(7, '19/0001', 7, 16, 'Bien!'),
(8, '19/0001', 8, 15, 'Bavarde trop! '),
(9, '19/0001', 9, 15, 'Bavarde trop!'),
(10, '19/0001', 10, 12, 'Bien!'),
(11, '19/0001', 11, 17, 'Très belle voix!'),
(12, '19/0001', 12, 16, 'T.Bien!');

-- --------------------------------------------------------

--
-- Structure de la table `restauration`
--

CREATE TABLE `restauration` (
  `id` int(11) NOT NULL,
  `jour` text NOT NULL,
  `date` date NOT NULL,
  `repas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `restauration`
--

INSERT INTO `restauration` (`id`, `jour`, `date`, `repas`) VALUES
(1, 'Dimanche', '2021-03-07', 'Loubya'),
(2, 'Lundi', '2021-03-08', 'Riz'),
(3, 'Mardi', '2021-03-09', 'Poisson'),
(4, 'Mercredi', '2021-03-10', 'Couscouss'),
(5, 'Jeudi', '2021-03-11', 'Chourba');

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

CREATE TABLE `type_utilisateur` (
  `id` int(11) NOT NULL,
  `type_utilisateur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_utilisateur`
--

INSERT INTO `type_utilisateur` (`id`, `type_utilisateur`) VALUES
(1, 'administrateur'),
(2, 'enseignant'),
(3, 'eleve'),
(4, 'parent');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `adr` text NOT NULL,
  `tlphn1` text NOT NULL,
  `tlphn2` text NOT NULL,
  `tlphn3` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `id_type`, `nom`, `prenom`, `sexe`, `adr`, `tlphn1`, `tlphn2`, `tlphn3`, `email`) VALUES
(1, 1, 'admin', 'admin', '', 'eformation', '555789611', '777854236', '648521796', 'admin@eformation.com'),
(2, 2, 'Benbarek', 'Bouchra', 'F', 'Alger, 11 rue ABC', '557894261', '0', '0', 'b_bouchra@eformation.com'),
(3, 2, 'Rachedi', 'Nada', 'F', 'Alger - Birkhadem', '775892145', '554785266', '668975826', 'r_nada@eformation.com'),
(4, 2, 'Afiane', 'Reda', 'H', 'Tipaza, 22 rue ABC', '775258932', '665892568', '0', 'a_reda@eformation.com'),
(5, 2, 'Hebbadj', 'Nesrine', 'F', 'Alger, Douira', '775895664', '0', '0', 'h_nesrine@eformation.com'),
(6, 3, 'El hassen', 'Nour', 'F', 'Alger, Bach-Djerrah', '558957359', '0', '0', 'e_nour@eformation.com'),
(7, 3, 'Hennouni', 'Narimane Hind', 'F', 'Alger , Bab-ezzouar', '551479254', '0', '0', 'h_narimane@eformation.com'),
(8, 3, 'Debiane', 'Mehdi', 'H', 'Alger, Birkhadem', '778594468', '0', '0', 'd_mehdi@eformation.com'),
(9, 3, 'Khouas', 'Ouerdia', 'F', 'Alger, Bab-ezzouar', '665879244', '0', '0', 'k_ouerdia@eformation.com'),
(10, 3, 'Benbrahim', 'Adem', 'H', 'Alger, Bordj El-Behri', '778941254', '0', '0', 'b_adem@eformation.com'),
(11, 4, 'El hassen', 'Mokhtar', 'H', 'Alger, Bach-Djerrah', '746982564', '0', '0', 'e_mokhtar@eformation.com'),
(12, 4, 'Hennouni', 'Linda', 'F', 'Alger, Bab-Ezzouar', '669857447', '0', '0', 'h_linda@eformation.com'),
(13, 4, 'Khouas', 'Smail', 'H', 'Alger, Bab-Ezzouar', '669852624', '777895441', '0', 'k_smail@eformation.com'),
(14, 4, 'Debiane', 'Farida', 'F', 'Alger, Brikhadem', '555478496', '666987568', '777846222', 'd_farida@eformation.com'),
(15, 4, 'Benbrahim', 'Dalila', 'F', 'Alger, Bordj El-Behri', '778495555', '658477755', '0', 'b_dalila@eformation.com'),
(16, 2, 'Beddek', 'Lilya', 'F', 'Alger, Douira', '555788491', '0', '0', 'b_lilya@eformation.com'),
(17, 2, 'Hamdin', 'Dahmane', 'H', 'Tipaza', '554777414', '667474845', '666447558', 'h_dahmane@eformation.com'),
(18, 1, 'Medjahed', 'Lamia', 'F', 'Alger', '665879475', '', '', 'l_medjahed@eformation.com'),
(19, 4, 'El hassen', 'karima', 'F', 'Alger, Bach-Djerrah', '777845555', '', '', 'e_karima@eformation.com'),
(20, 3, 'Boutata', 'Melissa', 'F', 'Tizi-ouzou', '778845586', '', '', 'b_melissa@eformation.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cycle`
--
ALTER TABLE `cycle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `diaporama`
--
ALTER TABLE `diaporama`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `edt`
--
ALTER TABLE `edt`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ens`
--
ALTER TABLE `ens`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu_accueil`
--
ALTER TABLE `menu_accueil`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `restauration`
--
ALTER TABLE `restauration`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_utilisateur`
--
ALTER TABLE `type_utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activite`
--
ALTER TABLE `activite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `cycle`
--
ALTER TABLE `cycle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `diaporama`
--
ALTER TABLE `diaporama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `edt`
--
ALTER TABLE `edt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `ens`
--
ALTER TABLE `ens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `menu_accueil`
--
ALTER TABLE `menu_accueil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `restauration`
--
ALTER TABLE `restauration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `type_utilisateur`
--
ALTER TABLE `type_utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
