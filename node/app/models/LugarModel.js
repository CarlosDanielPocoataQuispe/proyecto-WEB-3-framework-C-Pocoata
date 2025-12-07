const db = require('../database');

class LugarModel {
    async findAll() {
        const [rows] = await db.query('SELECT * FROM lugares');
        return rows;
    }

    async findById(id) {
        const [rows] = await db.query('SELECT * FROM lugares WHERE id = ?', [id]);
        return rows[0];
    }

    async create(data) {
        const { nombre, direccion } = data;
        const [result] = await db.query(
            'INSERT INTO lugares (nombre, direccion) VALUES (?, ?)',
            [nombre, direccion]
        );
        return result;
    }

    async update(id, data) {
        const { nombre, direccion } = data;
        const [result] = await db.query(
            'UPDATE lugares SET nombre = ?, direccion = ? WHERE id = ?',
            [nombre, direccion, id]
        );
        return result;
    }

    async delete(id) {
        const [result] = await db.query('DELETE FROM lugares WHERE id = ?', [id]);
        return result;
    }
}

module.exports = new LugarModel();