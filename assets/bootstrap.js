// Importation de Stimulus
import { Application } from 'stimulus';
import { definitionsFromContext } from 'stimulus/webpack-helpers';

// Créez une nouvelle application Stimulus
const application = Application.start();

// Trouvez les contrôleurs Stimulus à partir du contexte
const context = require.context('./controllers', true, /\.js$/);
application.load(definitionsFromContext(context));
