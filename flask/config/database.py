"""
Configuración y conexión a MySQL (XAMPP)
"""
import pymysql
from pymysql.cursors import DictCursor

class Database:
    """Clase para manejar conexiones a la base de datos"""
    
    # Configuración de conexión (XAMPP por defecto)
    CONFIG = {
        'host': 'localhost',
        'user': 'root',          # Usuario por defecto de XAMPP
        'password': '',          # Sin contraseña por defecto
        'database': 'gestion_eventos',
        'charset': 'utf8mb4',
        'cursorclass': DictCursor  # Retorna diccionarios en lugar de tuplas
    }
    
    @staticmethod
    def get_connection():
        """
        Obtiene una conexión a la base de datos
        
        Returns:
            pymysql.Connection: Objeto de conexión
        """
        try:
            connection = pymysql.connect(**Database.CONFIG)
            return connection
        except pymysql.Error as e:
            print(f"Error de conexión a MySQL: {e}")
            return None
    
    @staticmethod
    def execute_query(sql, params=None, fetch=False, fetch_one=False):
        """
        Ejecuta una consulta SQL
        
        Args:
            sql (str): Consulta SQL
            params (tuple): Parámetros para la consulta
            fetch (bool): Si se deben obtener múltiples resultados
            fetch_one (bool): Si se debe obtener un solo resultado
            
        Returns:
            Resultado de la consulta o True/False
        """
        conn = Database.get_connection()
        if not conn:
            return False
        
        try:
            with conn.cursor() as cursor:
                cursor.execute(sql, params or ())
                
                if fetch:
                    result = cursor.fetchall()
                elif fetch_one:
                    result = cursor.fetchone()
                else:
                    conn.commit()
                    result = True
                
                return result
        except pymysql.Error as e:
            print(f"Error en consulta SQL: {e}")
            print(f"SQL: {sql}")
            print(f"Parámetros: {params}")
            return False
        finally:
            conn.close()