import './bootstrap'
import Alpine from 'alpinejs'
import { mask } from '@alpinejs/mask'
import submitFormFuncionarios from './submitFormFuncionarios'

Alpine.plugin(mask)
window.Alpine = Alpine

Alpine.data('submitFormFuncionarios', submitFormFuncionarios)
Alpine.start()