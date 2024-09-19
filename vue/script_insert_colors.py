import os
import re
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

# Dictionnaire des codes hexadécimaux pour les couleurs
codes_hex = {
    'rouge': '#FF0000',
    'bleu': '#0000FF',
    'vert': '#00FF00',
    'jaune': '#FFFF00',
    'noir': '#000000',
    'blanc': '#FFFFFF',
    'ClearBlue': '#ADD8E6',
    'Blue': '#0000FF',
    'Orange': '#FFA500',
    'Rose': '#FFC0CB',
    'DMG': '#C0C0C0',
    'Violet': '#EE82EE',
    'Green': '#008000',
    'BLACK': '#000000',
    'ClearGreen': '#00FF00',
    'Grey': '#808080',
    'ClearBlueOcean': '#1E90FF',
    'ClearRed': '#FF6347',
    'ClearGlass': '#F0F8FF',
    'Clear': '#F5F5F5',
    'Black': '#000000',
    'Yellow': '#FFFF00',
    'ClearOrange': '#FFA500',
    'Ghost': '#F8F8FF',
    'White': '#FFFFFF',
    'USBC-02': '#A9A9A9',
    'ClearBlack': '#696969',
    'Red': '#FF0000'
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
base_path = 'vue/ASSETS/GB/FRONT'
couleurs = set()

for file in os.listdir(base_path):
    if file.endswith(('.png', '.jpg', '.jpeg')):
        # Extraire la couleur du nom de fichier
        file_name = os.path.splitext(file)[0]
        parts = file_name.split('_')
        couleur = parts[-1]  # La couleur est à la fin du nom de fichier
        # Supprimer les chiffres à la fin de la couleur sauf si c'est 'USBC-02'
        if couleur.lower() != 'usbc-02':
            couleur = re.sub(r'\d+$', '', couleur)
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