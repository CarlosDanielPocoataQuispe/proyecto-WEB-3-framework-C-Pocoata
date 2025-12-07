const express = require('express');
const router = express.Router();
const EventosController = require('../app/controllers/EventosController');

// Rutas para eventos
router.get('/', EventosController.index);
router.get('/crear', EventosController.crear);
router.post('/guardar', EventosController.guardar);
router.get('/editar/:id', EventosController.editar);
router.post('/actualizar/:id', EventosController.actualizar);
router.get('/eliminar/:id', EventosController.eliminar);

module.exports = router;