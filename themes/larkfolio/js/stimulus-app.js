import { Application } from '/wp-content/themes/larkfolio/js/vendor/stimulus.js';
import SkillfilterController from '/wp-content/themes/larkfolio/js/controllers/skillfilter_controller.js';
import ExperienceFilterController from '/wp-content/themes/larkfolio/js/controllers/experience_filter_controller.js';

window.Stimulus = Application.start();
Stimulus.register("skillfilter", SkillfilterController);
Stimulus.register("experience-filter", ExperienceFilterController);
