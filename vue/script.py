import os
import mysql.connector

# Connexion à la base de données MySQL
conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="db_workshop"
)
cursor = conn.cursor()

# Dossier contenant les images
image_folder = 'assets/gb/front'

# Fonction pour obtenir l'ID de la couleur
def get_color_id(color_name):
    cursor.execute("SELECT id FROM couleur WHERE nom = %s", (color_name,))
    result = cursor.fetchone()
    return result[0] if result else None

# Fonction pour extraire le nom de la couleur à partir du nom de fichier
def extract_color_name(filename_parts):
    color_part = filename_parts[-1]  # Le dernier segment contient la couleur avec potentiellement des chiffres
    color_part = os.path.splitext(color_part)[0]  # Supprimer l'extension (.jpg, .png)
    color_name = ''.join(filter(str.isalpha, color_part))  # Extraire seulement les lettres
    return color_name

# Parcourir les fichiers dans le dossier
for filename in os.listdir(image_folder):
    if filename.endswith(".jpg") or filename.endswith(".png"):
        # Extraire les informations du nom de fichier
        parts = filename.split('_')
        print(parts)  # Pour le débogage
        
        # Si la structure du nom de fichier est correcte
        if len(parts) >= 4:
            vue = parts[1]
            type_element = parts[2]
            color_name = extract_color_name(parts)  # Corriger l'extraction de la couleur
            
            # Obtenir l'ID de la couleur
            couleur_id = get_color_id(color_name)
            
            # Construire l'URL de l'image
            url_image = os.path.join(image_folder, filename)
            
            # Vérifier si couleur_id est None
            if couleur_id is None:
                # Insérer sans couleur_id uniquement pour un fichier spécifique
                if filename == "GB-Front-Front_USBC-02.png":
                    cursor.execute("""
                        INSERT INTO image(type_element, vue, url_image, image_file)
                        VALUES (%s, %s, %s, %s)
                    """, (type_element, vue, url_image, filename))
                else:
                    print(f"Couleur '{color_name}' non trouvée pour le fichier '{filename}'.")
                    continue  # Ignorer ce fichier et passer au suivant
            else:
                # Insérer les données avec couleur_id
                cursor.execute("""
                    INSERT INTO image(type_element, vue, url_image, image_file, couleur_id)
                    VALUES (%s, %s, %s, %s, %s)
                """, (type_element, vue, url_image, filename, couleur_id))
        else:
            print(f"Nom de fichier incorrect: {filename}")

# Valider les changements et fermer la connexion
conn.commit()
conn.close()
