-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : blog
--

-- --------------------------------------------------------

--
-- Structure de la table posts
--

CREATE TABLE recipes (
  id int(11) NOT NULL,
  recipe_title varchar(150) NOT NULL,
  recipe_description text NOT NULL,
  recipe_ingredients varchar(255) NOT NULL,
  recipe_instructions text NOT NULL,
  recipe_image text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table posts
--

INSERT INTO recipes (id, recipe_title, recipe_description, recipe_ingredients, recipe_instructions, recipe_image) VALUES
(1, 'Poulet au curry', 'Un plat épicé et savoureux', 'Poulet, curry, lait de coco, riz', 'Faire revenir le poulet dans une poêle avec de l\'huile d\'olive. Ajouter le curry et le lait de coco. Laisser mijoter 20 minutes. Servir avec du riz.', 'https://images.unsplash.com/photo-1581093458791-9d3c9ebe9f8e?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8Y3Vycnl8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80'),
(2, 'Pâtes à la carbonara', 'Un plat simple et délicieux', 'Pâtes, lardons, crème fraîche, oeufs, parmesan', 'Faire cuire les pâtes. Faire revenir les lardons dans une poêle. Ajouter la crème fraîche et les oeufs. Mélanger avec les pâtes. Ajouter le parmesan.', 'https://www.cuisineaz.com/assets/recipe/2017/03/31/1024x576/parmesan-oeuf-creme-lardons-1080.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table posts
--
ALTER TABLE recipes
  ADD PRIMARY KEY (id);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table posts
--
ALTER TABLE recipes
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
