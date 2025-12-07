const db = require('../database');

class RolModel {
    async findAll() {
        const [rows] = await db.query('SELECT * FROM rolesorganizador');
        return rows;
    }

    async findById(id) {
        const [rows] = await db.query('SELECT * FROM rolesorganizador WHERE id = ?', [id]);
        return rows[0];
    }

    async create(data) {
        const { nombre } = data;
        const [result] = await db.query(
            'INSERT INTO rolesorganizador (nombre) VALUES (?)',
            [nombre]
        );
        return result;
    }

    async update(id, data) {
        const { nombre } = data;
        const [result] = await db.query(
            'UPDATE rolesorganizador SET nombre = ? WHERE id = ?',
            [nombre, id]
        );
        return result;
    }

    async delete(id) {
        const [result] = await db.query('DELETE FROM rolesorganizador WHERE id = ?', [id]);
        return result;
    }
}

module.exports = new RolModel();