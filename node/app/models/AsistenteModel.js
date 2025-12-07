const db = require('../database');

class AsistenteModel {
    async findAll() {
        const [rows] = await db.query(`
            SELECT a.*, e.nombre as evento_nombre 
            FROM asistentes a 
            LEFT JOIN eventos e ON a.evento_id = e.id
        `);
        return rows;
    }

    async findById(id) {
        const [rows] = await db.query('SELECT * FROM asistentes WHERE id = ?', [id]);
        return rows[0];
    }

    async findByEvento(evento_id) {
        const [rows] = await db.query('SELECT * FROM asistentes WHERE evento_id = ?', [evento_id]);
        return rows;
    }

    async create(data) {
        const { evento_id, nombre, contacto } = data;
        const [result] = await db.query(
            'INSERT INTO asistentes (evento_id, nombre, contacto) VALUES (?, ?, ?)',
            [evento_id, nombre, contacto]
        );
        return result;
    }

    async update(id, data) {
        const { evento_id, nombre, contacto } = data;
        const [result] = await db.query(
            'UPDATE asistentes SET evento_id = ?, nombre = ?, contacto = ? WHERE id = ?',
            [evento_id, nombre, contacto, id]
        );
        return result;
    }

    async delete(id) {
        const [result] = await db.query('DELETE FROM asistentes WHERE id = ?', [id]);
        return result;
    }
}

module.exports = new AsistenteModel();