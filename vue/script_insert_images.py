import os
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

# Fonction pour obtenir l'ID de la couleur à partir du nom de la couleur
def get_couleur_id(nom_couleur):
    query = "SELECT couleur_id FROM couleur WHERE nom = %s"
    cursor.execute(query, (nom_couleur,))
    result = cursor.fetchone()
    return result[0] if result else None

# Fonction pour générer les requêtes d'insertion SQL
def generate_insert_queries(base_path, vue):
    queries = []
    for root, dirs, files in os.walk(base_path):
        for file in files:
            if file.endswith(('.png', '.jpg', '.jpeg')):
                # Extraire les informations du nom de fichier
                file_name = os.path.splitext(file)[0]
                parts = file_name.split('_')
                
                # Déterminer le type d'élément
                if 'dual' in parts:
                    type_element = 'coque_arriere'
                elif parts[0] in ['ips', 'button', 'pads']:
                    type_element = parts[0]
                else:
                    type_element = 'coque'
                
                # Déterminer la couleur
                couleur = parts[-1]
                couleur_id = get_couleur_id(couleur)
                
                # Déterminer l'URL de l'image
                url_image = os.path.join('assets/assets', vue, file)
                
                # Générer la requête d'insertion
                query = f"""
                INSERT INTO image (produit_id, type_element, vue, couleur_id, url_image, image)
                VALUES (1, '{type_element}', '{vue}', {couleur_id}, '{url_image}', '{file}')
                """
                queries.append(query)
                print(query)
    return queries

# Générer les requêtes pour les dossiers front et side
queries_front = generate_insert_queries('assets/assets/gb/front', 'front')
queries_side = generate_insert_queries('assets/assets/gb/side', 'side')

# Écrire les requêtes dans un fichier SQL
with open('insert_images.sql', 'w') as f:
    for query in queries_front + queries_side:
        f.write(query + ';\n')

# Fermer la connexion à la base de données
cursor.close()
conn.close()