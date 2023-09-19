import {request} from './util/api'
import * as dates from './util/dates'
import Pagination from './components/table-pagination'

Object.assign(window.koko_analytics, {
  components: {
    Pagination
  },
  util: {request, dates}
})