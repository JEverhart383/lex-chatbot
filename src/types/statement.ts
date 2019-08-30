import { Message } from './message';
export interface Statement {
  messages: Message[];
  responseCard: string;
}