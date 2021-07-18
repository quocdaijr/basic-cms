FROM rabbitmq:3.8.19-management

MAINTAINER NguyenQuocDai <quocdaijr@gmail.com>

COPY ./config/rabbitmq.conf /etc/rabbitmq/
COPY ./config/custom_definitions.json /etc/rabbitmq/

CMD ["rabbitmq-server"]