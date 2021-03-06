// This autogenerated skeleton file illustrates how to build a server.
// You should copy it to another filename to avoid overwriting it.

#include "PhpCppService.h"
#include <thrift/protocol/TBinaryProtocol.h>
#include <thrift/server/TSimpleServer.h>
#include <thrift/transport/TServerSocket.h>
#include <thrift/transport/TBufferTransports.h>

using namespace ::apache::thrift;
using namespace ::apache::thrift::protocol;
using namespace ::apache::thrift::transport;
using namespace ::apache::thrift::server;

using boost::shared_ptr;

using namespace  ::php_cpp_demo;

class PhpCppServiceHandler : virtual public PhpCppServiceIf {
 public:
  PhpCppServiceHandler() {
    // Your initialization goes here
  }

  void getStudentInfo(Response& _return, const Request& request) {
    // Your implementation goes here
    printf("getStudentInfo\n");
  }

};

int main(int argc, char **argv) {
  int port = 9090;
  shared_ptr<PhpCppServiceHandler> handler(new PhpCppServiceHandler());
  shared_ptr<TProcessor> processor(new PhpCppServiceProcessor(handler));
  shared_ptr<TServerTransport> serverTransport(new TServerSocket(port));
  shared_ptr<TTransportFactory> transportFactory(new TBufferedTransportFactory());
  shared_ptr<TProtocolFactory> protocolFactory(new TBinaryProtocolFactory());

  TSimpleServer server(processor, serverTransport, transportFactory, protocolFactory);
  server.serve();
  return 0;
}

