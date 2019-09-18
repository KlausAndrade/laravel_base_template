import Vue from 'vue'
import Modal from './Modal'
import Card from './Card'
import Child from './Child'
import Button from './Button'
import Checkbox from './Checkbox'
import { HasError, AlertError, AlertSuccess } from 'vform'
import TwCard from './TwCard'
import TwButton from './TwButton'
import TwCheckbox from './TwCheckbox'
import Toasted from 'vue-toasted'

Vue.use(Toasted, { position: 'bottom-right', duration: 5000 });
// Components that are registered globaly.
[
  Modal,
  TwCard,
  TwButton,
  TwCheckbox,
  Card,
  Child,
  Button,
  Checkbox,
  HasError,
  AlertError,
  AlertSuccess
].forEach(Component => {
  Vue.component(Component.name, Component)
})
