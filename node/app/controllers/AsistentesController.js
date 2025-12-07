const AsistenteModel = require('../models/AsistenteModel');
const EventoModel = require('../models/EventoModel');

class AsistentesController {
    async index(req, res) {
        try {
            const asistentes = await AsistenteModel.findAll();
            res.render('asistentes/index', {
                registros: asistentes,
                titulo: 'Asistentes',
                tipo: 'asistentes'
            });
        } catch (error) {
            console.error(error);
            res.status(500).send('Error interno del servidor');
        }
    }

    async crear(req, res) {
        try {
            const eventos = await EventoModel.findAll();
            res.render('asistentes/crear', {
                eventos: eventos,
                titulo: 'Crear Asistente',
                tipo: 'asistentes'
            });
        } catch (error) {
            console.error(error);
            res.status(500).send('Error interno del servidor');
        }
    }

    async guardar(req, res) {
        try {
            await AsistenteModel.create(req.body);
            res.redirect('/asistentes');
        } catch (error) {
            console.error(error);
            res.status(500).send('Error al guardar asistente');
        }
    }

    async editar(req, res) {
        try {
            const asistente = await AsistenteModel.findById(req.params.id);
            const eventos = await EventoModel.findAll();
            
            res.render('asistentes/editar', {
                registro: asistente,
                eventos: eventos,
                titulo: 'Editar Asistente',
                tipo: 'asistentes'
            });
        } catch (error) {
            console.error(error);
            res.status(500).send('Error interno del servidor');
        }
    }

    async actualizar(req, res) {
        try {
            await AsistenteModel.update(req.params.id, req.body);
            res.redirect('/asistentes');
        } catch (error) {
            console.error(error);
            res.status(500).send('Error al actualizar asistente');
        }
    }

    async eliminar(req, res) {
        try {
            await AsistenteModel.delete(req.params.id);
            res.redirect('/asistentes');
        } catch (error) {
            console.error(error);
            res.status(500).send('Error al eliminar asistente');
        }
    }
}

module.exports = new AsistentesController();