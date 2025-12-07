"""
Modelo para la tabla Lugares
"""
from config.database import Database

class LugarModel:
    """Maneja operaciones de base de datos para Lugares"""
    
    @staticmethod
    def get_all():
        """Obtiene todos los lugares"""
        sql = "SELECT * FROM Lugares ORDER BY nombre"
        return Database.execute_query(sql, fetch=True) or []
    
    @staticmethod
    def get_by_id(lugar_id):
        """Obtiene un lugar por su ID"""
        sql = "SELECT * FROM Lugares WHERE id = %s"
        return Database.execute_query(sql, (lugar_id,), fetch_one=True)
    
    @staticmethod
    def create(nombre, direccion):
        """Crea un nuevo lugar"""
        sql = "INSERT INTO Lugares (nombre, direccion) VALUES (%s, %s)"
        return Database.execute_query(sql, (nombre, direccion))
    
    @staticmethod
    def update(lugar_id, nombre, direccion):
        """Actualiza un lugar existente"""
        sql = "UPDATE Lugares SET nombre = %s, direccion = %s WHERE id = %s"
        return Database.execute_query(sql, (nombre, direccion, lugar_id))
    
    @staticmethod
    def delete(lugar_id):
        """Elimina un lugar"""
        sql = "DELETE FROM Lugares WHERE id = %s"
        return Database.execute_query(sql, (lugar_id,))