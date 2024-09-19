import os
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

# Dictionnaire des codes hexadécimaux pour les couleurs
codes_hex = {
    'rouge': '#FF0000',
    'bleu': '#0000FF',
    'vert': '#00FF00',
    'jaune': '#FFFF00',
    'noir': '#000000',
    'blanc': '#FFFFFF',
    'ClearBlue0023': '#ADD8E6',
    'Blue0023': '#0000FF',
    'Orange0023': '#FFA500',
    'Rose0023': '#FFC0CB',
    'DMG': '#C0C0C0',
    'Violet0023': '#EE82EE',
    'Green0023': '#008000',
    'BLACK': '#000000',
    'ClearGreen0023': '#00FF00',
    'Grey0023': '#808080',
    'ClearBlueOcean0023': '#1E90FF',
    'ClearRed0023': '#FF6347',
    'DMG0023': '#C0C0C0',
    'ClearGlass0023': '#F0F8FF',
    'Clear0023': '#F5F5F5',
    'Black0023': '#000000',
    'Yellow0023': '#FFFF00',
    'ClearOrange0023': '#FFA500',
    'Ghost0023': '#F8F8FF',
    'White0023': '#FFFFFF',
    'USBC-02': '#A9A9A9',
    'ClearBlack0023': '#696969',
    'Red0023': '#FF0000'
}

# Fonction pour insérer une couleur dans la table couleur
def insert_couleur(nom_couleur, code_hex):
    query = """
    INSERT INTO couleur (nom, code_hex)
    VALUES (%s, %s)
    """
    cursor.execute(query, (nom_couleur, code_hex))
    conn.commit()

# Parcourir les fichiers dans le dossier assets/assets/gb/front
base_path = 'WORKSHOP CLIENT1/ASSETS/ASSETS/GB/FRONT'
couleurs = set()

for file in os.listdir(base_path):
    if file.endswith(('.png', '.jpg', '.jpeg')):
        # Extraire la couleur du nom de fichier
        file_name = os.path.splitext(file)[0]
        parts = file_name.split('_')
        couleur = parts[-1]  # La couleur est à la fin du nom de fichier
        couleurs.add(couleur)

# Insérer les couleurs uniques dans la table couleur
for couleur in couleurs:
    if couleur in codes_hex:
        insert_couleur(couleur, codes_hex[couleur])
    else:
        print(f"Code hexadécimal non trouvé pour la couleur: {couleur}")

# Fermer la connexion à la base de données
cursor.close()
conn.close()