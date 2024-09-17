-- Table pour les admins
CREATE TABLE admin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('superadmin', 'admin') NOT NULL
);

-- Table pour les produits
CREATE TABLE produit (
    produit_id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prix_base DECIMAL(10, 2) NOT NULL,
    description TEXT
);

-- Table pour les couleurs
CREATE TABLE couleur (
    couleur_id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    code_hex CHAR(7) NOT NULL -- Code hexadécimal comme #RRGGBB
);

-- Table pour les coques (avant et arrière)
CREATE TABLE coque (
    coque_id INT AUTO_INCREMENT PRIMARY KEY,
    type ENUM('avant', 'arrière') NOT NULL,
    couleur_id INT,
    prix_optionnel DECIMAL(10, 2),
    FOREIGN KEY (couleur_id) REFERENCES couleur(couleur_id) ON DELETE SET NULL
);

-- Table pour les accessoires
CREATE TABLE accessoire (
    accessoire_id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL
);

-- Vérification et amélioration du schéma de la base de données

-- Table produit_configuration
CREATE TABLE produit_configuration (
    produit_id INT NOT NULL,
    coque_avant_id INT NOT NULL,
    coque_arriere_id INT NOT NULL,
    ecran_ips_id INT NOT NULL,
    boutons_id INT NOT NULL,
    pads_id INT NOT NULL,
    installation_batterie BOOLEAN NOT NULL DEFAULT FALSE,
    FOREIGN KEY (produit_id) REFERENCES produit(produit_id) ON DELETE CASCADE,
    FOREIGN KEY (coque_avant_id) REFERENCES coque(coque_id) ON DELETE CASCADE,
    FOREIGN KEY (coque_arriere_id) REFERENCES coque(coque_id) ON DELETE CASCADE,
    FOREIGN KEY (ecran_ips_id) REFERENCES couleur(couleur_id),
    FOREIGN KEY (boutons_id) REFERENCES couleur(couleur_id),
    FOREIGN KEY (pads_id) REFERENCES couleur(couleur_id)
);

-- Table image
CREATE TABLE image (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    produit_id INT NOT NULL,
    type_element ENUM('coque', 'ecran', 'boutons', 'pads') NOT NULL,
    vue ENUM('front', 'side', 'back'),
    couleur_id INT,
    url_image VARCHAR(255) NOT NULL,
    FOREIGN KEY (produit_id) REFERENCES produit(produit_id) ON DELETE CASCADE,
    FOREIGN KEY (couleur_id) REFERENCES couleur(couleur_id) ON DELETE SET NULL
);

-- Table configuration_accessoire
CREATE TABLE configuration_accessoire (
    configuration_id INT NOT NULL,
    accessoire_id INT NOT NULL,
    PRIMARY KEY (configuration_id, accessoire_id),
    FOREIGN KEY (configuration_id) REFERENCES configuration(configuration_id) ON DELETE CASCADE,
    FOREIGN KEY (accessoire_id) REFERENCES accessoire(accessoire_id) ON DELETE CASCADE
);

-- Ajout d'index sur les colonnes de clé étrangère et fréquemment filtrées

-- Table produit_configuration
CREATE INDEX idx_produit_id ON produit_configuration(produit_id);
CREATE INDEX idx_coque_avant_id ON produit_configuration(coque_avant_id);
CREATE INDEX idx_coque_arriere_id ON produit_configuration(coque_arriere_id);
CREATE INDEX idx_ecran_ips_id ON produit_configuration(ecran_ips_id);
CREATE INDEX idx_boutons_id ON produit_configuration(boutons_id);
CREATE INDEX idx_pads_id ON produit_configuration(pads_id);

-- Table image
CREATE INDEX idx_produit_id_image ON image(produit_id);
CREATE INDEX idx_couleur_id_image ON image(couleur_id);

-- Table accessoire
-- Si vous avez des requêtes qui filtrent souvent par nom ou prix, vous pouvez ajouter des index sur ces colonnes
CREATE INDEX idx_nom_accessoire ON accessoire(nom);
CREATE INDEX idx_prix_accessoire ON accessoire(prix);