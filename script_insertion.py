import bcrypt
import mysql.connector

# Configuration de la connexion à la base de données
db_config = {
     'user': 'root',
    'password': '',
    'host': 'localhost',
    'database': 'workshopclient1'
}

# Connexion à la base de données
conn = mysql.connector.connect(**db_config)
cursor = conn.cursor()

# Fonction pour insérer un admin dans la table admin
def insert_admin(username, password, role):
    # Générer un hash pour le mot de passe
    password_hash = bcrypt.hashpw(password.encode('utf-8'), bcrypt.gensalt())
    
    # Requête d'insertion
    query = """
    INSERT INTO admin (username, password_hash, role)
    VALUES (%s, %s, %s)
    """
    cursor.execute(query, (username, password_hash, role))
    conn.commit()

# Fonction pour insérer un produit dans la table produit
def insert_produit(nom, prix_base, description):
    # Requête d'insertion
    query = """
    INSERT INTO produit (nom, prix_base, description)
    VALUES (%s, %s, %s)
    """
    cursor.execute(query, (nom, prix_base, description))
    conn.commit()

# Insérer des admins
#insert_admin('admin', 'admin', 'admin')

# Insérer un produit
insert_produit('GAMEBOY DMG', 129.00, 'La Game Boy DMG est une console de jeu portable classique de Nintendo, sortie pour la première fois en 1989. Elle est connue pour sa robustesse, sa longue durée de vie de la batterie et sa vaste bibliothèque de jeux. Cette console a marqué l\'histoire du jeu vidéo portable et reste un objet de collection prisé.')


# Fermer la connexion à la base de données
cursor.close()
conn.close()