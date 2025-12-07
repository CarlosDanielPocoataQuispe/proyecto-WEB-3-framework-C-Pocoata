const express = require('express');
const router = express.Router();
const AsistentesController = require('../app/controllers/AsistentesController');

// Rutas para asistentes
router.get('/', AsistentesController.index);
router.get('/crear', AsistentesController.crear);
router.post('/guardar', AsistentesController.guardar);
router.get('/editar/:id', AsistentesController.editar);
router.post('/actualizar/:id', AsistentesController.actualizar);
router.get('/eliminar/:id', AsistentesController.eliminar);

module.exports = router;