import { Statement } from './statement';
import { Prompt } from './prompt';

export interface Intent {
  name: string;
  version: string;
  description?: string;
  createVersion?: boolean;
  conclusionStatement?: Statement;
  confirmationPrompt?: Prompt;
  sampleUtterances: string[];
  rejectionStatement: Statement;
  followUpPrompt: FollowUpPrompt;

}

export interface FollowUpPrompt {
  prompt: Prompt;
  rejectionStatement: Statement;
}