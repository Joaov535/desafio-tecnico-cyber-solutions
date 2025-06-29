import './bootstrap'
import Alpine from 'alpinejs'
import { mask } from '@alpinejs/mask'
import Swal from 'sweetalert2'
import submitFormEmployees from './submit-form-employee'
import writeTableListEmployees from './write-table-list-employees'

Alpine.plugin(mask)
window.Alpine = Alpine
window.Swal = Swal

Alpine.data('submitFormEmployees', submitFormEmployees)
Alpine.data('writeTableListEmployees', writeTableListEmployees)
Alpine.start()