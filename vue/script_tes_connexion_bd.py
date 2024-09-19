import mysql.connector
from mysql.connector import Error

# Configuration de la connexion à la base de données
db_config = {
    'user': 'root',
    'password': '',
    'host': 'localhost',
    'database': 'workshopclient1'
}

try:
    # Connexion à la base de données
    conn = mysql.connector.connect(**db_config)
    
    if conn.is_connected():
        print("Connexion réussie à la base de données")
        
        # Exécuter une requête simple pour vérifier la connexion
        cursor = conn.cursor()
        cursor.execute("SELECT DATABASE();")
        record = cursor.fetchone()
        print("Vous êtes connecté à la base de données :", record)
        
        # Fermer le curseur et la connexion
        cursor.close()
        conn.close()
        print("Connexion fermée")
    else:
        print("Échec de la connexion à la base de données")

except Error as e:
    print("Erreur lors de la connexion à la base de données :", e)