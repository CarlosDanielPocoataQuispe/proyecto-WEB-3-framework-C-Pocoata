"""
Modelo para la tabla RolesOrganizador
"""
from config.database import Database

class RolModel:
    """Maneja operaciones de base de datos para Roles"""
    
    @staticmethod
    def get_all():
        """Obtiene todos los roles"""
        sql = "SELECT * FROM RolesOrganizador ORDER BY nombre"
        return Database.execute_query(sql, fetch=True) or []
    
    @staticmethod
    def get_by_id(rol_id):
        """Obtiene un rol por su ID"""
        sql = "SELECT * FROM RolesOrganizador WHERE id = %s"
        return Database.execute_query(sql, (rol_id,), fetch_one=True)
    
    @staticmethod
    def create(nombre):
        """Crea un nuevo rol"""
        sql = "INSERT INTO RolesOrganizador (nombre) VALUES (%s)"
        return Database.execute_query(sql, (nombre,))
    
    @staticmethod
    def update(rol_id, nombre):
        """Actualiza un rol existente"""
        sql = "UPDATE RolesOrganizador SET nombre = %s WHERE id = %s"
        return Database.execute_query(sql, (nombre, rol_id))
    
    @staticmethod
    def delete(rol_id):
        """Elimina un rol"""
        sql = "DELETE FROM RolesOrganizador WHERE id = %s"
        return Database.execute_query(sql, (rol_id,))