export interface GetRequest {
  resource: string;
  name?: string;
}
export interface PostRequest {
  resource: string;
  name?: string;
  payload: object;
}

declare global {
  interface Window {
    AWS_WORKBENCH: WordPressNonce;
  }
}

export interface WordPressNonce {
  rest_nonce: string;
}


export class DataService {
  public static async getResource (getRequest:GetRequest) {
    try {
      const resourcePath = getRequest.hasOwnProperty('name') ? `${getRequest.resource}/${getRequest.name}` : `${getRequest.resource}`
      const fullPath = `/wp-json/aws-workbench/v1/lex/${resourcePath}`
      const wordpressNonce:WordPressNonce = window.AWS_WORKBENCH;
      const result = await fetch( fullPath, {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json',
          'X-WP-Nonce': window.AWS_WORKBENCH.rest_nonce
        }
      }).then(data => data.json())
      return result

    } catch (error) {
      return error.message
    }
  }
}