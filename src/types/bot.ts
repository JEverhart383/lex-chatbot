export interface Bot {
  name: string;
  description: string;
  intents?: [];
  clarificationPrompt?: object;
  abortStatement: object;
  processBehavior: string;
  status: string;
  lastUpdatedDate: string;
  createdDate: string;
  idleSessionTTLInSeconds: number;
  voiceId: string;
  locale: string;
  childDirected: boolean;
}