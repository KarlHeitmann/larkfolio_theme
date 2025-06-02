import { Application } from '/wp-content/themes/larkfolio/js/vendor/stimulus.js';
import HelloController from '/wp-content/themes/larkfolio/js/controllers/hello_controller.js';
import SkillfilterController from '/wp-content/themes/larkfolio/js/controllers/skillfilter_controller.js';

window.Stimulus = Application.start();
Stimulus.register("hello", HelloController);
Stimulus.register("skillfilter", SkillfilterController);
