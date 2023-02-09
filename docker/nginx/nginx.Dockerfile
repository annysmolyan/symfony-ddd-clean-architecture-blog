FROM nginx:1.20

RUN apt-get update \
    && apt-get install --no-install-recommends --no-install-suggests -q -y \
    nginx \
    procps \
    vim
