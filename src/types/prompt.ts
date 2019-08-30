import { Message } from './message';
export interface Prompt {
  maxAttempts: number;
  messages: Message[];
  responseCard?: string;
}