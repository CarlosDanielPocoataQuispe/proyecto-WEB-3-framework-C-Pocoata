const RolModel = require('../models/RolModel');

class RolesController {
    async index(req, res) {
        try {
            const roles = await RolModel.findAll();
            res.render('roles/index', {
                registros: roles,
                titulo: 'Roles Organizador',
                tipo: 'roles'
            });
        } catch (error) {
            console.error('Error en RolesController.index:', error);
            res.status(500).send('Error interno del servidor');
        }
    }

    async crear(req, res) {
        res.render('roles/crear', {
            titulo: 'Crear Rol',
            tipo: 'roles'
        });
    }

    async guardar(req, res) {
        try {
            await RolModel.create(req.body);
            res.redirect('/roles');
        } catch (error) {
            console.error('Error en RolesController.guardar:', error);
            res.status(500).send('Error al guardar rol');
        }
    }

    async editar(req, res) {
        try {
            const rol = await RolModel.findById(req.params.id);
            res.render('roles/editar', {
                registro: rol,
                titulo: 'Editar Rol',
                tipo: 'roles'
            });
        } catch (error) {
            console.error('Error en RolesController.editar:', error);
            res.status(500).send('Error interno del servidor');
        }
    }

    async actualizar(req, res) {
        try {
            await RolModel.update(req.params.id, req.body);
            res.redirect('/roles');
        } catch (error) {
            console.error('Error en RolesController.actualizar:', error);
            res.status(500).send('Error al actualizar rol');
        }
    }

    async eliminar(req, res) {
        try {
            await RolModel.delete(req.params.id);
            res.redirect('/roles');
        } catch (error) {
            console.error('Error en RolesController.eliminar:', error);
            res.status(500).send('Error al eliminar rol');
        }
    }
}

module.exports = new RolesController();