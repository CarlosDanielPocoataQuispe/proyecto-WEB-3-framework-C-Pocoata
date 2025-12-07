const db = require('../database');

class EventoModel {
    async findAll() {
        const [rows] = await db.query(`
            SELECT e.*, l.nombre as lugar_nombre, r.nombre as organizador_nombre 
            FROM eventos e 
            LEFT JOIN lugares l ON e.lugar_id = l.id 
            LEFT JOIN rolesorganizador r ON e.organizador_id = r.id
            ORDER BY e.fecha DESC
        `);
        return rows;
    }

    async findById(id) {
        const [rows] = await db.query(`
            SELECT e.*, l.nombre as lugar_nombre, r.nombre as organizador_nombre 
            FROM eventos e 
            LEFT JOIN lugares l ON e.lugar_id = l.id 
            LEFT JOIN rolesorganizador r ON e.organizador_id = r.id
            WHERE e.id = ?
        `, [id]);
        return rows[0];
    }

    async create(data) {
        const { nombre, fecha, lugar_id, organizador_id } = data;
        const [result] = await db.query(
            'INSERT INTO eventos (nombre, fecha, lugar_id, organizador_id) VALUES (?, ?, ?, ?)',
            [nombre, fecha, lugar_id, organizador_id]
        );
        return result;
    }

    async update(id, data) {
        const { nombre, fecha, lugar_id, organizador_id } = data;
        const [result] = await db.query(
            'UPDATE eventos SET nombre = ?, fecha = ?, lugar_id = ?, organizador_id = ? WHERE id = ?',
            [nombre, fecha, lugar_id, organizador_id, id]
        );
        return result;
    }

    async delete(id) {
        const [result] = await db.query('DELETE FROM eventos WHERE id = ?', [id]);
        return result;
    }
}

module.exports = new EventoModel();