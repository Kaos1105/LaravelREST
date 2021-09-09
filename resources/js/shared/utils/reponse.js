export const is404 = (response) => {
  return isErrorWithStatus(response) && response.response.status === 404
}

export const is422 = (response) => {
  return isErrorWithStatus(response) && response.response.status === 422
}

const isErrorWithStatus = (response) => {
  return response.response && response.response.status
}