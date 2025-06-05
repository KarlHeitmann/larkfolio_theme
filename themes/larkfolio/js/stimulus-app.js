import { Application } from './vendor/stimulus.js';
import SkillfilterController from './controllers/skillfilter_controller.js';
import ExperienceFilterController from './controllers/experience_filter_controller.js';

window.Stimulus = Application.start();
Stimulus.register("skillfilter", SkillfilterController);
Stimulus.register("experience-filter", ExperienceFilterController);
