"""
Modelo para la tabla Asistentes
"""
from config.database import Database

class AsistenteModel:
    """Maneja operaciones de base de datos para Asistentes"""
    
    @staticmethod
    def get_all():
        """Obtiene todos los asistentes con información del evento"""
        sql = """
        SELECT a.*, e.nombre as evento_nombre 
        FROM Asistentes a
        LEFT JOIN Eventos e ON a.evento_id = e.id
        ORDER BY a.nombre
        """
        return Database.execute_query(sql, fetch=True) or []
    
    @staticmethod
    def get_by_id(asistente_id):
        """Obtiene un asistente por su ID"""
        sql = "SELECT * FROM Asistentes WHERE id = %s"
        return Database.execute_query(sql, (asistente_id,), fetch_one=True)
    
    @staticmethod
    def create(nombre, contacto, evento_id):
        """Crea un nuevo asistente"""
        sql = "INSERT INTO Asistentes (nombre, contacto, evento_id) VALUES (%s, %s, %s)"
        return Database.execute_query(sql, (nombre, contacto, evento_id))
    
    @staticmethod
    def update(asistente_id, nombre, contacto, evento_id):
        """Actualiza un asistente existente"""
        sql = "UPDATE Asistentes SET nombre = %s, contacto = %s, evento_id = %s WHERE id = %s"
        return Database.execute_query(sql, (nombre, contacto, evento_id, asistente_id))
    
    @staticmethod
    def delete(asistente_id):
        """Elimina un asistente"""
        sql = "DELETE FROM Asistentes WHERE id = %s"
        return Database.execute_query(sql, (asistente_id,))