import bcrypt
import mysql.connector

# Configuration de la connexion à la base de données
db_config = {
     'user': 'root',
    'password': '',
    'host': 'localhost',
    'database': 'db_workshop_test'
}

# Connexion à la base de données
conn = mysql.connector.connect(**db_config)
cursor = conn.cursor()

# Fonction pour insérer un admin dans la table admin
def insert_admin(admin_id,username, password, role):
    # Générer un hash pour le mot de passe
    password_hash = bcrypt.hashpw(password.encode('utf-8'), bcrypt.gensalt())
    
    # Requête d'insertion
    query = """
    INSERT INTO admin (admin_id, username, password, role)
    VALUES (%s, %s, %s, %s)
    """
    try:
        cursor.execute(query, (admin_id, username, password_hash, role))
        conn.commit()
    except mysql.connector.Error as err:
        print(f"Error: {err}")
        conn.rollback()

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
#insert_admin(1,'admin', 'admin', 'admin')

# Insérer un produit
insert_produit('GAMEBOY DMG2', 130.00, 'La Game Boy DMG est une console de jeu portable.')


# Fermer la connexion à la base de données
cursor.close()
conn.close()